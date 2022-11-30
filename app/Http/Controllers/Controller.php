<?php

namespace App\Http\Controllers;

use App\Models\MempelaiPria;
use App\Models\MempelaiWanita;
use App\Models\User;
use App\Models\Photo;
use App\Models\AkadNikah;
use App\Models\Galeri;
use App\Models\RangkaianAcara;
use App\Models\Resepsi;
use App\Models\Mempelai;
use App\Models\Paket;
use App\Models\Template;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Traits\ValidationResponser;
use App\Traits\RouteResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $modelArrayOut, $getModel, $getModelRequest;

    public function __construct()
    {
        $name = Route::currentRouteName(); // Get Route
        $this->modelArrayOut = implode($this->removeS($name)); // Get Route without 's'
        $this->getModel = 'App\Models\\'. ucfirst(implode($this->removeStripSecondWordUppercase())); // Get Model
    }

    protected function removeS($name)
    {
        $model = [];
        for($i =0; $i<Str::length($name); $i++){
            if($name[$i] == "s" && $name[$i+1] == "."){
                continue;
            }else if($name[$i] == "."){
                break;
            }else{
                $model[] = $name[$i];
            }
        }

        return $model;
    }

    protected function removeStripSecondWordUppercase()
    {
        $modelArrayOutNoStrip = [];
        for($i = 0; $i<intval(Str::length($this->modelArrayOut)); $i++){
            if($this->modelArrayOut[$i-1] == '-'){
                $modelArrayOutNoStrip[] = strtoupper($this->modelArrayOut[$i]); 
            }else if($this->modelArrayOut[$i] == '-'){
                continue;
            }else{
                $modelArrayOutNoStrip[] = $this->modelArrayOut[$i];
            }
        }

        return $modelArrayOutNoStrip;
    }

    protected function getModelLatestId()
    {
        if(isset($this->getModel::latest()->first()->id) == null){
            return 1;
        }else if($this->getModel::latest()->first()->id != null){
            return $this->getModel::latest()->first()->id+1;
        }
    }

    protected function doValidation($request, $id='')
    {
        if($this->modelArrayOut == strtolower(__('app.menus.user'))){
            return ValidationResponser::userValidation($request, $id);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.mempelai_pria')) || $this->modelArrayOut == strtolower(__('app.menus.mempelai_wanita'))){
            return ValidationResponser::mempelaiPriaWanitaValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.mempelai'))){
            return ValidationResponser::mempelaiValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.photo'))){
            return ValidationResponser::photoValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.galeri'))){
            return ValidationResponser::galeriValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.akad_nikah')) || $this->modelArrayOut == strtolower(__('app.menus.resepsi'))){
            return ValidationResponser::akadNikahResepsiValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.rangkaian_acara')) || $this->modelArrayOut == strtolower(__('app.menus.resepsi'))){
            return ValidationResponser::rangkaianAcaraValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.paket'))){
            return ValidationResponser::paketValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.template'))){
            return ValidationResponser::templateValidation($request);
        }

        if($this->modelArrayOut == strtolower(__('app.menus.transaction'))){
            return ValidationResponser::transactionValidation($request);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.konten'))){
            return ValidationResponser::kontenValidation($request);
        }
    }

    protected function getImagePath($imageData)
    {
        if(is_array($imageData) == 'Array'? count($imageData) > 1 : ''){
            $images = [];
            foreach($imageData as $image){
                $uploadedImage = $image;
                $extension = $uploadedImage->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $imageName = md5(microtime()) . '.' . $extension;
                $uploadedImage->move($destinationPath, $imageName);
                $images[] = $imageName;
            }
            
            return $images;
        }else{
            $uploadedImage = $imageData;
            $extension = $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $imageName = md5(microtime()) . '.' . $extension;
            $uploadedImage->move($destinationPath, $imageName);
            
            return $imageName;
        }
    }

    protected function getMempelaiDatas()
    {
        $mempelaiDatas = array();

        return array_merge($mempelaiDatas,[
            array('mempelaiPriaCode' => MempelaiPria::getMempelaiPriaCode()), 
            array('mempelaiWanitaCode' => MempelaiWanita::getMempelaiWanitaCode())
        ]);
    }

    protected function getPhotoDatas()
    {
        return Photo::getPhotosId();
    }

    protected function getRangkaianAcaraDatas()
    {
        $rangkaianAcaraDatas = array();

        return array_merge($rangkaianAcaraDatas, [
            array('akadNikahCode' => AkadNikah::getAkadNikahCode()), 
            array('resepsiCode' => Resepsi::getResepsiCode()),
        ]);
    }

    protected function getKontenDatas()
    {
        $kontenDatas = array();

        return array_merge($kontenDatas, [
            array('galeriCode' => Galeri::getGaleriCode()), 
            array('mempelaiCode' => Mempelai::getMempelaiCode()), 
            array('rangkaianAcaraCode' => RangkaianAcara::getRangkaianAcaraCode()), 
            array('transactionCode' => Transaction::getTransactionCode()), 
        ]);
    }

    protected function getTransactionDatas()
    {
        $transactionDatas = array();

        return array_merge($transactionDatas, [
            array('paketCode' => Paket::getPaketCode()), 
            array('userCode' => User::getUserCodes()), 
            array('templateCode' => Template::getTemplateCode()),
        ]);
    }

    protected function index()
    {
        return view(strtolower(__('app.buttons.manages')).'.'.$this->modelArrayOut.'.index')
            ->with([
                implode($this->removeStripSecondWordUppercase()).'s' => $this->getModel::all()->sortByDesc('id'), 
                'routes' => RouteResponser::$mainRouteArray,
            ]);
    }

    protected function create()
    {
        $nullVariable = 0;
        $this->modelArrayOut == strtolower(__('app.menus.mempelai')) ? $mempelaiDatas = $this->getMempelaiDatas() : '';
        $this->modelArrayOut == strtolower(__('app.menus.galeri')) ? $photoDatas = $this->getPhotoDatas() : '';
        $this->modelArrayOut == strtolower(__('app.menus.rangkaian_acara')) ? $rangkaianAcaraDatas = $this->getRangkaianAcaraDatas() : '';
        $this->modelArrayOut == strtolower(__('app.menus.transaction')) ? $transactionDatas = $this->getTransactionDatas() : '';
        $this->modelArrayOut == strtolower(__('app.menus.konten')) ? $kontenDatas = $this->getkontenDatas() : '';
        
        
        return view(strtolower(__('app.buttons.manages')).'.'.$this->modelArrayOut.'.'.strtolower(__('app.buttons.add')), 
            compact(
                $this->modelArrayOut ==  strtolower(__('app.menus.mempelai')) && $mempelaiDatas ? 'mempelaiDatas' : 'nullVariable',
                
                $this->modelArrayOut ==  strtolower(__('app.menus.galeri')) && $photoDatas ? 'photoDatas' : 'nullVariable',
                
                $this->modelArrayOut ==  strtolower(__('app.menus.rangkaian_acara')) && $rangkaianAcaraDatas ? 'rangkaianAcaraDatas' : 'nullVariable',
                
                $this->modelArrayOut == strtolower(__('app.menus.transaction')) && $transactionDatas ? 'transactionDatas' : 'nullVariable',
                
                $this->modelArrayOut ==  strtolower(__('app.menus.konten')) && $kontenDatas ? 'kontenDatas' : 'nullVariable',
            ))->with([
                'routes' => RouteResponser::$mainRouteArray,
            ]);
    }

    protected function store(Request $request)
    {
        $this->doValidation($request);
        
        $field = new $this->getModel;
        $field->code = strtoupper($this->modelArrayOut[0].$this->modelArrayOut[1]).strval($this->getModelLatestId());
        
        if($this->modelArrayOut == strtolower(__('app.menus.user'))){
            $field->name = $request->name ?? '';
            $field->email = $request->email ?? '';
            $field->phone = $request->phone ?? '';
            $field->password = Hash::make($request->password ?? strval($request->name[0].'123'));
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.mempelai_pria')) || $this->modelArrayOut == strtolower(__('app.menus.mempelai_wanita'))){
            $field->fullname = $request->fullname ?? '';
            $field->father_name = $request->father ?? '';
            $field->mother_name = $request->mother ?? '';
            $field->description = $request->description ?? '';
            $field->photo = $request->file('image') ? $this->getImagePath($request->file('image')) : '';
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.mempelai'))){
            $field->mempelai_pria_code = $request->mempelai_pria_code;
            $field->mempelai_wanita_code = $request->mempelai_wanita_code;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.photo'))){
            $field->photo = $request->file('photo') ? json_encode($this->getImagePath($request->file('photo'))) : '';
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.galeri'))){
            $field->photo_code = $request->photo_code;
            $field->title = $request->title;
            $field->description = $request->description;
            $field->video = $request->video;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.akad_nikah')) || $this->modelArrayOut == strtolower(__('app.menus.resepsi'))){
            $field->place = $request->place;
            $field->date = $request->date;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.rangkaian_acara'))){
            $field->akad_nikah_code = $request->akad_nikah_code;
            $field->resepsi_code = $request->resepsi_code;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.paket'))){
            $field->type = $request->type;
            $field->price = $request->price;
            $field->benefit = json_encode($request->benefit);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.template'))){
            $field->name = $request->name;
            $field->type = $request->type;
        }

        if($this->modelArrayOut == strtolower(__('transaction'))){
            $field->paket_code = $request->paket_code;
            $field->user_code = $request->user_code;
            $field->template_code = $request->template_code;
            $field->order = $request->order;
            $field->usage = $request->usage;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.konten'))){
            $field->galeri_code = $request->galeri_code;
            $field->mempelai_code = $request->mempelai_code;
            $field->rangkaian_acara_code = $request->rangkaian_acara_code;
            $field->transaction_code = $request->transaction_code;
            $field->rekening = $request->rekening;
        }

        $field->save();

        return redirect($this->modelArrayOut.'s');
    }

    protected function edit($id)
    {
        $field = $this->getModel::findOrFail($id);

        $nullVariable = 0;
        $this->modelArrayOut == strtolower(__('app.menus.mempelai')) ? $mempelaiDatas = $this->getMempelaiDatas() : '';
        
        $this->modelArrayOut == strtolower(__('app.menus.galeri')) ? $photoDatas = $this->getPhotoDatas() : '';
        
        $this->modelArrayOut == strtolower(__('app.menus.rangkaian_acara')) ? $rangkaianAcaraDatas = $this->getRangkaianAcaraDatas() : '';
        
        $this->modelArrayOut == strtolower(__('app.menus.transaction')) ? $transactionDatas = $this->getTransactionDatas() : '';
        
        $this->modelArrayOut == strtolower(__('app.menus.konten')) ? $kontenDatas = $this->getKontenDatas() : '';

        return view(strtolower(__('app.buttons.manages')).'.'.$this->modelArrayOut.'.'.strtolower(__('app.buttons.edit')), 
            compact(
                $this->modelArrayOut ==  strtolower(__('app.menus.mempelai')) && $mempelaiDatas ? 'mempelaiDatas' : 'nullVariable',
                
                $this->modelArrayOut ==  strtolower(__('app.menus.galeri')) && $photoDatas ? 'photoDatas' : 'nullVariable',
                
                $this->modelArrayOut ==  strtolower(__('app.menus.rangkaian_acara')) && $rangkaianAcaraDatas ? 'rangkaianAcaraDatas' : 'nullVariable',
                
                $this->modelArrayOut == strtolower(__('app.menus.transaction')) && $transactionDatas ? 'transactionDatas' : 'nullVariable',
                
                $this->modelArrayOut ==  strtolower(__('app.menus.konten')) && $kontenDatas ? 'kontenDatas' : 'nullVariable',

            ))->with([
                'routes' => RouteResponser::$mainRouteArray,
                'field' => $field,
            ]);
    }

    protected function update(Request $request, $id=null)
    {
        $this->doValidation($request, $id);

        $field = $this->getModel::findOrFail($id);

        if($this->modelArrayOut == strtolower(__('app.menus.user'))){
            $field->name = $request->name;
            $field->email = $request->email;
            $field->phone = $request->phone;
            $field->password = Hash::make($request->password);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.mempelai_pria')) || $this->modelArrayOut == strtolower(__('app.menus.mempelai_wanita'))){
            $field->fullname = $request->fullname ?? '';
            $field->father_name = $request->father ?? '';
            $field->mother_name = $request->mother ?? '';
            $field->description = $request->description ?? '';
            $field->photo = $request->file('image') ? $this->getImagePath($request->file('image')) : $field->photo;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.mempelai'))){
            $field->mempelai_pria_code = $request->mempelai_pria_code;
            $field->mempelai_wanita_code = $request->mempelai_wanita_code;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.photo'))){
            $field->photo = $request->file('photo') ? json_encode($this->getImagePath($request->file('photo'))) : $field->photo;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.galeri'))){
            $field->photo_code = $request->photo_code;
            $field->title = $request->title;
            $field->description = $request->description;
            $field->video = $request->video;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.akad_nikah')) || $this->modelArrayOut == strtolower(__('app.menus.resepsi'))){
            $field->place = $request->place;
            $field->date = $request->date; 
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.rangkaian_acara'))){
            $field->akad_nikah_code = $request->akad_nikah_code;
            $field->resepsi_code = $request->resepsi_code;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.paket'))){
            $field->type = $request->type;
            $field->price = $request->price;
            $field->benefit = json_encode($request->benefit);
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.template'))){
            $field->name = $request->name;
            $field->type = $request->type;
        }

        if($this->modelArrayOut == strtolower(__('transaction'))){
            $field->paket_code = $request->paket_code;
            $field->user_code = $request->user_code;
            $field->template_code = $request->template_code;
            $field->order = $request->order;
            $field->usage = $request->usage;
        }
        
        if($this->modelArrayOut == strtolower(__('app.menus.konten'))){
            $field->galeri_code = $request->galeri_code;
            $field->mempelai_code = $request->mempelai_code;
            $field->rangkaian_acara_code = $request->rangkaian_acara_code;
            $field->transaction_code = $request->transaction_code;
            $field->rekening = $request->rekening;
        }

        $field->save();

        return redirect($this->modelArrayOut.'s');
    }

    protected function destroy($id)
    {
        $this->getModel::findOrFail($id)->delete();

        return redirect($this->modelArrayOut.'s');
    }
}

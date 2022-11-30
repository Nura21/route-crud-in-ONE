<?php

namespace App\Traits;

class ValidationResponser
{
    public static function userValidation($request, $id='')
    {
        return $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|'.\Illuminate\Validation\Rule::unique('users')->ignore($id ? $id : ''),
            'password' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => __('app.fields.name').' '.__('app.validations.required'),
            'email.required' => __('app.fields.email').' '.__('app.validations.required'),
            'password.required' => __('app.fields.password').' '.__('app.validations.required'),
            'phone.required' => __('app.fields.phone').' '.__('app.validations.required')
        ]);
    }

    public static function mempelaiPriaWanitaValidation($request)
    {
        return $request->validate([
            'fullname' => 'required|max:255',
            'father' => 'required|max:255',
            'mother' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ], [
            'fullname.required' => __('app.fields.fullname').' '.__('app.validations.required'),
            'father_name.required' => __('app.fields.father').' '.__('app.validations.required'),
            'mother_name.required' => __('app.fields.mother').' '.__('app.validations.required'),
            'description.required' => __('app.fields.description').' '.__('app.validations.required'),
            'image.image' => __('app.fields.photo').' '.__('app.validations.img'),
            'image.file' => __('app.fields.photo').' '.__('app.validations.file'),
        ]);
    }

    public static function mempelaiValidation($request)
    {
        return $request->validate([
            'mempelai_pria_code' => 'required',
            'mempelai_wanita_code' => 'required',
        ], [
            'mempelai_pria_code.required' => __('app.fields.code').' '.__('app.validations.required'),
            'mempelai_wanita_code.required' => __('app.fields.code').' '.__('app.validations.required'),
        ]);
    }

    public static function photoValidation($request)
    {
        return $request->validate([
            'photo.*' => 'required|image|file',
        ], [
            'photo.*.required' => __('app.fields.photo').' '.__('app.validations.required'),
            'photo.*.image' => __('app.fields.photo').' '.__('app.validations.img'),
            'photo.*.file' => __('app.fields.photo').' '.__('app.validations.file'),
        ]);
    }

    public static function galeriValidation($request)
    {
        return $request->validate([
            'photo_code' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'video' => 'required',
        ], [
            'photo_code.required' => __('app.fields.photo').' '.__('app.validations.required'),
            'title.required' => __('app.fields.title').' '.__('app.validations.required'),
            'description.required' => __('app.fields.description').' '.__('app.validations.required'),
            'video.required' => __('app.fields.video').' '.__('app.validations.required'),
        ]);
    }

    public static function akadNikahResepsiValidation($request)
    {
        return $request->validate([
            'place' => 'required|max:255',
            'date' => 'required',
        ], [
            'place.required' => __('app.fields.place').' '.__('app.validations.required'),
            'date.required' => __('app.fields.date').' '.__('app.validations.required'),
        ]);
    }

    public static function rangkaianAcaraValidation($request)
    {
        return $request->validate([
            'akad_nikah_code' => 'required',
            'resepsi_code' => 'required',
        ], [
            'akad_nikah_code.required' => __('app.fields.code').' '.__('app.validations.required'),
            'resepsi_code.required' => __('app.fields.code').' '.__('app.validations.required'),
        ]);
    }

    public static function paketValidation($request)
    {
        return $request->validate([
            'type' => 'required|max:255',
            'price' => 'required',
            'benefit.*' => 'required'
        ], [
            'type.required' => __('app.fields.type').' '.__('app.validations.required'),
            'price.required' => __('app.fields.price').' '.__('app.validations.required'),
            'benefit.*.required' => __('app.fields.benefit').' '.__('app.validations.required'),
        ]);
    }

    public static function templateValidation($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
        ], [
            'name.required' => __('app.fields.name').' '.__('app.validations.required'),
            'type.required' => __('app.fields.type').' '.__('app.validations.required'),
        ]);
    }

    public static function transactionValidation($request)
    {
        return $request->validate([
            'paket_code' => 'required',
            'user_code' => 'required',
            'template_code' => 'required',
            'order' => 'required',
            'usage' => 'required',
        ], [
            'paket_code.required' => __('app.menus.paket').' '.__('app.validations.required'),
            'user_code.required' => __('app.menus.user').' '.__('app.validations.required'),
            'template_code.required' => __('app.menus.template').' '.__('app.validations.required'),
            'order.required' => __('app.fields.order').' '.__('app.validations.required'),
            'usage.required' => __('app.fields.usage').' '.__('app.validations.required'),
        ]);
    }

    public static function kontenValidation($request)
    {
        return $request->validate([
            'galeri_code' => 'required',
            'mempelai_code' => 'required',
            'rangkaian_acara_code' => 'required',
            'transaction_code' => 'required',
            'rekening' => 'required|string'
        ], [
            'galeri_code.required' => __('app.menus.galeri').' '.__('app.validations.required'),
            'mempelai_code.required' => __('app.menus.mempelai').' '.__('app.validations.required'),
            'rangkaian_acara_code.required' => __('app.menus.rangkaian_acara').' '.__('app.validations.required'),
            'transaction_code.required' => __('app.menus.transaction').' '.__('app.validations.required'),
            'rekening.required' => __('app.fields.rekening').' '.__('app.validations.required'),
        ]);
    }
}

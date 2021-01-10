<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home    |   Belajar CodeIgniter4'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Girya Kebraon Timur FA/30',
                    'kota'  => 'Surabaya'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Girya Kebraon',
                    'kota'  => 'Surabaya'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
    //--------------------------------------------------------------------

}

<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TeknisiAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek login teknisi
        if (!session()->get('nama')) {
            return redirect()->to('/teknisi/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
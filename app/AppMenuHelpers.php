<?php

namespace App;

use Illuminate\Http\Request;

class AppMenuHelpers
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public Request $request
    ) {
        //
    }

    public function render()
    {
        return [
            [
                'name'     => 'Dashboard',
                'icon'     => 'solar:home-2-linear', // Menggunakan format Iconify
                'route'    => 'dashboard',
                'children' => null,
            ],
            [
                'name'     => 'Aplikasi POS',
                'icon'     => 'solar:shop-2-linear',
                'route'    => 'pos.*',
                'children' => [
                    [
                        'name'  => 'Transaksi Kasir',
                        'route' => route('login'),
                        'icon'  => 'solar:cart-large-minimalistic-linear',
                    ],
                    [
                        'name'  => 'Riwayat Penjualan',
                        'route' => 'pos.orders',
                        'icon'  => 'solar:clipboard-list-linear',
                    ],
                    [
                        'name'  => 'Stok Barang',
                        'route' => 'pos.inventory',
                        'icon'  => 'solar:box-linear',
                    ],
                ],
            ],
            [
                'name'     => 'Invitnesia',
                'icon'     => 'solar:palette-round-linear',
                'route'    => 'invitnesia.*',
                'children' => [
                    [
                        'name'  => 'Semua Undangan',
                        'route' => 'invitnesia.index',
                        'icon'  => 'solar:list-down-minimalistic-linear',
                    ],
                    [
                        'name'  => 'Editor Template',
                        'route' => 'invitnesia.editor',
                        'icon'  => 'solar:clapperboard-edit-linear',
                    ],
                ],
            ],
            [
                'name'     => 'LMS Pasundan',
                'icon'     => 'solar:magnifer-zoom-in-linear',
                'route'    => 'lms.*',
                'children' => [
                    [
                        'name'  => 'Materi Kuliah',
                        'route' => 'lms.materials',
                        'icon'  => 'solar:notebook-linear',
                    ],
                    [
                        'name'  => 'Bank Soal',
                        'route' => 'lms.quiz',
                        'icon'  => 'solar:document-text-linear',
                    ],
                ],
            ],
        ];
    }
}

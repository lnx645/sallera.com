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
                'icon'     => 'solar:home-2-linear',
                'route'    => 'dashboard',
                'children' => null,
            ],
            [
                'name'     => 'Pelanggan',
                'icon'     => 'flowbite:users-group-outline',
                'route'    => 'dashboard',
                'children' => null,
            ],
            [
                'name'     => 'Produk & Invertory',
                'icon'     => 'fluent-mdl2:product',
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
                'name'     => 'Pegawai',
                'icon'     => 'streamline-ultimate:office-employee',
                'route'    => 'pegawai.*',
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
                'name'     => 'Transaksi & Pembayaran',
                'icon'     => 'hugeicons:invoice-02',
                'route'    => 'lms.*',
                'children' => [
                    [
                        'name'  => 'Penjualan',
                        'route' => 'lms.materials',
                        'icon'  => 'solar:notebook-linear',
                    ],
                    [
                        'name'  => 'Pendapatan/Pengeluaran',
                        'route' => 'lms.quiz',
                        'icon'  => 'solar:document-text-linear',
                    ],
                    [
                        'name'  => 'Pembayaran Digital',
                        'route' => 'lms.quiz',
                        'icon'  => 'solar:document-text-linear',
                    ],
                ],
            ],
            [
                'name'     => 'Laporan Penjualan',
                'icon'     => 'tabler:report-search',
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

            [
                'name'     => 'Pengaturan',
                'icon'     => 'tabler:settings',
                'route'    => 'lms.*',
                'children' => [
                    [
                        'name'  => 'Aplikasi',
                        'route' => 'lms.materials',
                        'icon'  => 'eos-icons:application-outlined',
                    ],
                    [
                        'name'  => 'Toko',
                        'route' => 'lms.quiz',
                        'icon'  => 'boxicons:store'
                    ],
                     [
                        'name'  => 'Poin Of Sales',
                        'route' => 'lms.quiz',
                        'icon'  => 'mdi:printer-pos-cog-outline'
                    ],
                      [
                        'name'  => 'Pajak Dan Biaya',
                        'route' => 'fluent:feed-24-regular',
                        'icon'  => 'fluent:feed-24-regular'
                    ],
                      [
                        'name'  => 'Payment Gateway',
                        'route' => 'fluent:feed-24-regular',
                        'icon'  => 'pajamas:api'
                    ],
                ],
            ]
        ];
    }
}

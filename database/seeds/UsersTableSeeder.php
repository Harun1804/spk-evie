<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
              'nama'      => 'topsis',
              'email'      => 'admin@gmail.com',
              'password'  => bcrypt('12345678')
            ]
          ]);


          DB::table('kriteria')->insert([
              [
                'nama_kriteria'      => 'Luas Rumah (K1)',
                'kode'      => 'K1',
                'attribute' =>'Benefit',
                'bobot' =>4
              ],
              [
                'nama_kriteria'      => 'Aset (K2)',
                'kode'      => 'K2',
                'attribute' =>'Benefit',
                'bobot' =>2
              ],
              [
                'nama_kriteria'      => 'Jenis Lantai (K3)',
                'kode'      => 'K3',
                'attribute' =>'Benefit',
                'bobot' =>4
              ],
              [
                'nama_kriteria'      => 'Jenis Dinding (K4)',
                'kode'      => 'K4',
                'attribute' =>'Benefit',
                'bobot' =>4
              ],
              [
                'nama_kriteria'      => 'Sumber Air (K5)',
                'kode'      => 'K5',
                'attribute' =>'Benefit',
                'bobot' =>3
              ],
              [
                'nama_kriteria'      => 'Lansia (K6)',
                'kode'      => 'K6',
                'attribute' =>'Cost',
                'bobot' =>3
              ],
              [
                'nama_kriteria'      => 'Jumlah Tanggungan (K7)',
                'kode'      => 'K7',
                'attribute' =>'Cost',
                'bobot' =>3
              ],
              [
                'nama_kriteria'      => 'Penghasilan (K8)',
                'kode'      => 'K8',
                'attribute' =>'Cost',
                'bobot' =>4
              ]
            ]);


            DB::table('sub_kriteria')->insert([
              //kriteria k1
                [
                  'kriteria_id'      => '1',
                  'nama'      => '>35 m2',
                  'bobot'  => '1'
                ],
                [
                  'kriteria_id'      => '1',
                  'nama'      => '26 - 35 m2',
                  'bobot'  => '2'
                ],
                [
                  'kriteria_id'      => '1',
                  'nama'      => '16-25 m2',
                  'bobot'  => '3'
                ],
                [
                  'kriteria_id'      => '1',
                  'nama'      => '10 -15 m2',
                  'bobot'  => '4'
                ],
                [
                  'kriteria_id'      => '1',
                  'nama'      => '<10 m2',
                  'bobot'  => '5'
                ],
                //kriteria k2
                  [
                    'kriteria_id'      => '2',
                    'nama'      => '<10 jt',
                    'bobot'  => '1'
                  ],
                  [
                    'kriteria_id'      => '2',
                    'nama'      => '> 10 jt',
                    'bobot'  => '2'
                  ],
                  //kriteria k3
                    [
                      'kriteria_id'      => '3',
                      'nama'      => 'Granit',
                      'bobot'  => '1'
                    ],
                    [
                      'kriteria_id'      => '3',
                      'nama'      => 'Keramik',
                      'bobot'  => '2'
                    ],
                    [
                      'kriteria_id'      => '3',
                      'nama'      => 'Semen',
                      'bobot'  => '3'
                    ],
                    [
                      'kriteria_id'      => '3',
                      'nama'      => 'Papan',
                      'bobot'  => '4'
                    ],
                    [
                      'kriteria_id'      => '3',
                      'nama'      => 'Tanah',
                      'bobot'  => '5'
                    ],

                    //kriteria k4
                      [
                        'kriteria_id'      => '4',
                        'nama'      => 'tembok',
                        'bobot'  => '1'
                      ],
                      [
                        'kriteria_id'      => '4',
                        'nama'      => 'papan',
                        'bobot'  => '2'
                      ],
                      [
                        'kriteria_id'      => '4',
                        'nama'      => 'triplek',
                        'bobot'  => '3'
                      ],
                      [
                        'kriteria_id'      => '4',
                        'nama'      => 'bambu',
                        'bobot'  => '4'
                      ],


                      //kriteria k5
                        [
                          'kriteria_id'      => '5',
                          'nama'      => 'PDAM',
                          'bobot'  => '1'
                        ],
                        [
                          'kriteria_id'      => '5',
                          'nama'      => 'pompa air',
                          'bobot'  => '2'
                        ],
                        [
                          'kriteria_id'      => '5',
                          'nama'      => 'sumur',
                          'bobot'  => '3'
                        ],
                        //kriteria k6
                          [
                            'kriteria_id'      => '6',
                            'nama'      => 'Tidak Ada',
                            'bobot'  => '1'
                          ],
                          [
                            'kriteria_id'      => '6',
                            'nama'      => 'Ada',
                            'bobot'  => '2'
                          ],
                          //kriteria k7
                            [
                              'kriteria_id'      => '7',
                              'nama'      => '>5 orang',
                              'bobot'  => '1'
                            ],
                            [
                              'kriteria_id'      => '7',
                              'nama'      => '2 - 5 orang',
                              'bobot'  => '2'
                            ],
                            [
                              'kriteria_id'      => '7',
                              'nama'      => '1 orang',
                              'bobot'  => '3'
                            ],

                            //kriteria k8
                              [
                                'kriteria_id'      => '8',
                                'nama'      => '>5 jt',
                                'bobot'  => '1'
                              ],
                              [
                                'kriteria_id'      => '8',
                                'nama'      => '3 jt - 4 jt',
                                'bobot'  => '2'
                              ],
                              [
                                'kriteria_id'      => '8',
                                'nama'      => '2 jt - 3 jt',
                                'bobot'  => '3'
                              ],
                              [
                                'kriteria_id'      => '8',
                                'nama'      => '500 rb - 1 jt',
                                'bobot'  => '4'
                              ],
                              [
                                'kriteria_id'      => '8',
                                'nama'      => '<500 rb',
                                'bobot'  => '5'
                              ],

              ]);


            DB::table('alternatif')->insert([
                [
                  'nama_lengkap'      => 'Jaenab',
                  'nik'      => '11',
                  'no_kk'  => '111'
                ],
                [
                  'nama_lengkap'      => 'Minto',
                  'nik'      => '22',
                  'no_kk'  => '222'
                ],
                [
                  'nama_lengkap'      => 'Nur Mami',
                  'nik'      => '33',
                  'no_kk'  => '333'
                ]
                ,[
                  'nama_lengkap'      => 'Mugito',
                  'nik'      => '44',
                  'no_kk'  => '444'
                ]
                ,[
                  'nama_lengkap'      => 'Madi',
                  'nik'      => '55',
                  'no_kk'  => '555'
                ]
              ]);

              DB::table('keputusan')->insert([
                  // Jaenab => alternatif_id (1)
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '1',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => '2',
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '2',
                    'bobot_kriteria'=>2,
                    'sub_kriteria_id'  => 7,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '3',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 9,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '4',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 13,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '5',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 19,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '6',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 20,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '7',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 24,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 1,
                    'kriteria_id'      => '8',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 28,
                    'bobot_sub_kriteria'  => 4
                  ],

                  // Minto => alternatif_id (2)
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '1',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 3,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '2',
                    'bobot_kriteria'=>2,
                    'sub_kriteria_id'  => 7,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '3',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 10,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '4',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 15,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '5',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 19,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '6',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 21,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '7',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 24,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 2,
                    'kriteria_id'      => '8',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 28,
                    'bobot_sub_kriteria'  => 4
                  ],

                  // Nur Mami => alternatif_id (3)
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '1',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 5,
                    'bobot_sub_kriteria'  => 5
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '2',
                    'bobot_kriteria'=>2,
                    'sub_kriteria_id'  => 7,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '3',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 10,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '4',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 13,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '5',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 18,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '6',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 20,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '7',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 22,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 3,
                    'kriteria_id'      => '8',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 28,
                    'bobot_sub_kriteria'  => 4
                  ],

                  // Mugito => alternatif_id (4)
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '1',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 4,
                    'bobot_sub_kriteria'  => 4
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '2',
                    'bobot_kriteria'=>2,
                    'sub_kriteria_id'  => 7,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '3',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 9,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '4',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 13,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '5',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 18,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '6',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 21,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '7',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 24,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 4,
                    'kriteria_id'      => '8',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 27,
                    'bobot_sub_kriteria'  => 3
                  ],

                  // Madi => alternatif_id (5)
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '1',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 3,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '2',
                    'bobot_kriteria'=>2,
                    'sub_kriteria_id'  => 7,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '3',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 11,
                    'bobot_sub_kriteria'  => 4
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '4',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 13,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '5',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 19,
                    'bobot_sub_kriteria'  => 3
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '6',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 20,
                    'bobot_sub_kriteria'  => 1
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '7',
                    'bobot_kriteria'=>3,
                    'sub_kriteria_id'  => 23,
                    'bobot_sub_kriteria'  => 2
                  ],
                  [
                    'alternatif_id'      => 5,
                    'kriteria_id'      => '8',
                    'bobot_kriteria'=>4,
                    'sub_kriteria_id'  => 28,
                    'bobot_sub_kriteria'  => 4
                  ],




                ]);

    }
}

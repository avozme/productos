<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Auriculares Bluetooth',
                'description' => 'Auriculares inalámbricos con cancelación de ruido.',
                'price' => 59.99,
            ],
            [
                'name' => 'Teclado Mecánico',
                'description' => 'Teclado con switches azules y retroiluminación RGB.',
                'price' => 89.90,
            ],
            [
                'name' => 'Mouse Gamer',
                'description' => 'Ratón ergonómico con hasta 16000 DPI.',
                'price' => 39.50,
            ],
            [
                'name' => 'Monitor 27"',
                'description' => 'Monitor IPS Full HD con 75Hz de refresco.',
                'price' => 189.00,
            ],
            [
                'name' => 'Silla Ergonomica',
                'description' => 'Silla de oficina con soporte lumbar ajustable.',
                'price' => 129.99,
            ],
            [
                'name' => 'Disco SSD 1TB',
                'description' => 'Unidad de estado sólido NVMe PCIe Gen3.',
                'price' => 109.49,
            ],
            [
                'name' => 'Laptop Ultraligera',
                'description' => 'Portátil con procesador i5 y 8GB de RAM.',
                'price' => 799.99,
            ],
            [
                'name' => 'Hub USB-C',
                'description' => 'Adaptador con HDMI, USB y lector de tarjetas.',
                'price' => 24.95,
            ],
            [
                'name' => 'Cámara Web Full HD',
                'description' => 'Cámara para videollamadas con micrófono incorporado.',
                'price' => 49.00,
            ],
            [
                'name' => 'Cargador Inalámbrico',
                'description' => 'Base de carga rápida compatible con Qi.',
                'price' => 19.99,
            ],
        ]);
    }
}

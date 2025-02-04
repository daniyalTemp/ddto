<?php
return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font_size' => '18',
    'default_font' => 'vazir',
    'margin_left' => 20,
    'margin_right' => 20,
    'margin_top' => 30,
    'margin_bottom' => 10,
    'margin_header' => 0,
    'margin_footer' => 0,
    'orientation' => 'P',
    'title' => 'Laravel mPDF',
    'author' => '',
    'watermark' => '',
    'show_watermark' => false,
    'watermark_font' => 'vazir',
    'display_mode' => 'fullpage',
    'watermark_text_alpha' => 0.1,
    'directionality' => 'rtl',
    'custom_font_dir' => public_path('/fonts/'),
    'custom_font_data' => [
        'vazir' => [
            'R' => 'vazir.ttf',    // regular font
            'B' => 'vazir-Bold.ttf',       // optional: bold font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
    ],
    'auto_language_detection' => true,
    'temp_dir' => base_path('../temp/')
];

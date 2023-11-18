<title> Eventrix | Decorations</title>
<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
<?php
// Simulate loading different sets of images based on the "set" parameter
if (isset($_GET['set'])) {
    $set = $_GET['set'];

    // Define your image paths and headings for different sets
    $imageSets = [
        1 => [
            [
                'heading' => 'Premium Decorations',
                'images' => [
                    "./dist/img/decoration1.jpeg",
                    "./dist/img/decoration2.jpeg",
                    "./dist/img/decoration3.jpeg",
                    "./dist/img/decoration7.jpeg",
                    "./dist/img/decoration8.jpeg",
                    "./dist/img/decoration9.jpeg",
                    "./dist/img/decoration13.jpeg",
                    "./dist/img/decoration14.jpeg",
                    "./dist/img/decoration15.jpeg",
                    "./dist/img/decoration19.jpeg",
                    "./dist/img/decoration20.jpeg",
                    "./dist/img/decoration21.jpeg",
                    "./dist/img/decoration25.jpeg",
                    "./dist/img/decoration26.jpeg",
                    "./dist/img/decoration27.jpeg",
                    // Add more images
                ]
            ],
            [
                'heading' => 'Standard Decorations',
                'images' => [
                    "./dist/img/decoration4.jpeg",
                    "./dist/img/decoration5.jpeg",
                    "./dist/img/decoration6.jpeg",
                    "./dist/img/decoration10.jpeg",
                    "./dist/img/decoration11.jpeg",
                    "./dist/img/decoration12.jpeg",
                    "./dist/img/decoration16.jpeg",
                    "./dist/img/decoration17.jpeg",
                    "./dist/img/decoration18.jpeg",
                    "./dist/img/decoration22.jpeg",
                    "./dist/img/decoration23.jpeg",
                    "./dist/img/decoration24.jpeg",
                    "./dist/img/decoration28.jpeg",
                    "./dist/img/decoration29.jpeg",
                    "./dist/img/decoration30.jpeg",
                    // Add more images
                ]
            ]				
        ],
            2 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/decoration31.jpeg",
                     "./dist/img/decoration32.jpeg",
                    "./dist/img/decoration33.jpeg",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/decoration34.jpeg",
                "./dist/img/decoration35.jpeg",
                    "./dist/img/decoration36.jpeg",
                   
                    // Add more images 
                ]
            ]
        ],
        3 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/decoration37.jpeg",
                     "./dist/img/decoration38.jpeg",
                    "./dist/img/decoration39.jpeg",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/decoration40.jpeg",
                "./dist/img/decoration41.jpeg",
                    "./dist/img/decoration42.jpg",
                   
                    // Add more images
                ]
            ]
        ],  
		4 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/decp1.png",
                     "./dist/img/decp2.png",
                    "./dist/img/decp3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/decs1.png",
                "./dist/img/decs2.png",
                    "./dist/img/decs3.png",
                   
                    // Add more images
                ]
            ]
        ],  
		5 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/pget1.png",
                     "./dist/img/pget2.png",
                    "./dist/img/pget3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/sget1.png",
                "./dist/img/sget2.png",
                    "./dist/img/sget3.png",
                   
                    // Add more images
                ]
            ]
        ],  
		6 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/ppool1.png",
                     "./dist/img/ppool2.png",
                    "./dist/img/ppool3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/spool1.png",
                "./dist/img/spool2.png",
                    "./dist/img/spool3.png",
                   
                    // Add more images
                ]
            ]
        ],
       7 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/pc1.png",
                     "./dist/img/pc2.png",
                    "./dist/img/pc3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/sc1.png",
                "./dist/img/sc2.png",
                    "./dist/img/sc3.png",
                   
                    // Add more images
                ]
            ]
        ],	
        8 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/pb1.png",
                     "./dist/img/pb2.png",
                    "./dist/img/pb3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/sb1.png",
                "./dist/img/sb2.png",
                    "./dist/img/sb3.png",
                   
                    // Add more images
                ]
            ]
        ],	
        9 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/pac1.png",
                     "./dist/img/pac2.png",
                    "./dist/img/pac3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/sac1.png",
                "./dist/img/sac2.png",
                    "./dist/img/sac3.png",
                   
                    // Add more images
                ]
            ]
        ],	
        10 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/pbc1.png",
                     "./dist/img/pbc2.png",
                    "./dist/img/pbc3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/sbc1.png",
                "./dist/img/sbc2.png",
                    "./dist/img/sbc3.png",
                   
                    // Add more images
                ]
            ]
        ],	
        11 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/ps1.png",
                     "./dist/img/ps2.png",
                    "./dist/img/ps3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/ss1.png",
                "./dist/img/ss2.png",
                    "./dist/img/ss3.png",
                   
                    // Add more images
                ]
            ]
        ],	
        12 => [
            [
                'heading' => 'premium Decorations',
                'images' => [
                    "./dist/img/pp1.png",
                     "./dist/img/pp2.png",
                    "./dist/img/pp3.png",
                   
                    // Add more images
                ]
            ],
            [
                'heading' => 'standard Decorations',
                'images' => [
                    "./dist/img/sp1.png",
                "./dist/img/sp2.png",
                    "./dist/img/sp3.png",
                   
                    // Add more images
                ]
            ]
        ],			
    ];

    if (isset($imageSets[$set])) {
        $currentSet = $imageSets[$set];

        echo '<div class="image-gallery" style="display: flex; flex-direction: column; gap: 20px;">'; // Add gap styling and set flex-direction

        foreach ($currentSet as $set) {
            echo '<h1>' . $set['heading'] . '</h1>';
            echo '<div style="display: flex; gap: 20px;">'; // Add a flex container for images
            foreach ($set['images'] as $image) {
                echo '<img src="' . $image . '" alt="' . $image . '" style="width: 300px; height: auto;">'; // Set width and height to 300px, adjust as needed
            }
            echo '</div>';
        }

        echo '</div>';

        echo '<script>
            const images = document.querySelectorAll(".image-gallery img");
            let imageIndex = 0;

            function scrollImages() {
                images[imageIndex].style.display = "none";
                imageIndex = (imageIndex + 1) % images.length;
                images[imageIndex].style.display = "block";
            }

            images[imageIndex].style.display = "block";
            setInterval(scrollImages, 3000); // Change the interval as needed (3 seconds in this example)
        </script>';
    } else {
        echo "Invalid set specified.";
    }
} else {
    echo "No set specified.";
}
?>

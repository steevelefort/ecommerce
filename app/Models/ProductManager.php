<?php

namespace App\Models;

use Exception;

use function PHPUnit\Framework\throwException;

class ProductManager {

  protected static $data = [
    [
      "id"=> 1,
      "image"=> "fabian-heimann-4R_WEmhx8og-unsplash.jpg",
      "name"=> "True Lash",
      "price"=> 250,
      "vat"=> 20,
      "description"=> "In aliquet tristique purus, nec cursus augue posuere convallis. Fusce consequat velit eget pharetra elementum. Quisque faucibus posuere arcu, nec luctus neque placerat nec. Donec nec massa id eros dignissim lobortis id nec nisl. Sed posuere fermentum diam eu tristique. Vestibulum purus risus, tristique eu consequat ut, consequat id risus. Cras eget augue est. Vestibulum id enim eu nibh molestie rhoncus. Sed euismod congue mi non iaculis. Pellentesque blandit bibendum velit, a lacinia nisl laoreet et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc laoreet imperdiet urna, rhoncus scelerisque nunc congue vitae."
    ],
    [
      "id"=> 2,
      "image"=> "ian-bevis-IJjfPInzmdk-unsplash.jpg",
      "name"=> "Black’n White",
      "price"=> 55,
      "vat"=> 20,
      "description"=> "Nam ut lorem eu quam dignissim consectetur. Nam porta a mi at finibus. Sed pharetra, neque et eleifend mollis, quam magna vehicula risus, id faucibus mauris odio in arcu. Sed accumsan in orci non condimentum. Suspendisse sit amet rhoncus libero. Phasellus maximus lorem imperdiet nunc euismod, posuere ultrices velit consectetur. Nulla nibh tellus, faucibus eu nisl in, condimentum dictum nisl."
    ],
    [
      "id"=> 3,
      "image"=> "imani-bahati-LxVxPA1LOVM-unsplash.jpg",
      "name"=> "Black Rocket",
      "price"=> 75,
      "vat"=> 20,
      "description"=> "Nullam vitae diam vitae felis viverra aliquet vel a ex. Proin vehicula non nisl eget aliquet. Duis vel pulvinar nibh. Quisque vitae quam eu nunc ultrices sagittis. Aenean ullamcorper iaculis erat sit amet mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac interdum neque, condimentum congue orci. Fusce maximus ante diam, dapibus efficitur lorem dignissim ac. Aenean semper sem vitae sem sagittis laoreet. Ut cursus justo eu mi euismod, eget imperdiet ante vehicula. Aenean ut luctus nisl. Nunc a egestas dui."
    ],
    [
      "id"=> 4,
      "image"=> "irene-kredenets-KStSiM1UvPw-unsplash.jpg",
      "name"=> "Smart Peach",
      "price"=> 90,
      "vat"=> 20,
      "description"=> "Duis sed bibendum eros. Etiam non velit aliquet, scelerisque orci ut, congue eros. Vestibulum sodales ipsum vitae ullamcorper maximus. Proin sed suscipit metus, viverra luctus sapien. Integer tincidunt nisi interdum ligula egestas, a bibendum leo egestas. Pellentesque congue eu magna in tristique. Etiam fringilla urna odio, porttitor porttitor arcu blandit in."
    ],
    [
      "id"=> 5,
      "image"=> "john-torcasio-TJrkkhdB39E-unsplash.jpg",
      "name"=> "Smart Shark",
      "price"=> 5199,
      "vat"=> 20,
      "description"=> "Donec eu mattis felis. Sed nunc odio, consectetur vitae sollicitudin in, tincidunt at metus. In vel nunc sed justo accumsan ultrices vitae quis turpis. Praesent interdum nisi quis ipsum rutrum, vitae placerat urna molestie. Nam aliquam tortor massa, sit amet rhoncus justo ultricies et. Sed in convallis ex. Aliquam bibendum semper metus id porttitor. Cras a hendrerit nisi. Nullam ut leo imperdiet, placerat lorem nec, volutpat erat."
    ],
    [
      "id"=> 6,
      "image"=> "lloyd-dirks-0vsk2_9dkqo-unsplash.jpg",
      "name"=> "Smart Pear",
      "price"=> 799,
      "vat"=> 20,
      "description"=> "Maecenas mollis congue rhoncus. Ut eleifend, purus ut mattis porta, mi purus commodo eros, vel vehicula turpis ligula vitae lorem. Etiam aliquam pretium massa, id bibendum leo vestibulum at. Morbi finibus finibus nulla, eu iaculis nibh ornare vel. Vestibulum ut tortor luctus, egestas libero vitae, consequat diam. Fusce a lorem ac sapien dignissim scelerisque. Cras non finibus nisi. Donec facilisis malesuada nisl nec tincidunt. Quisque tempor leo ut lacus condimentum, sit amet aliquet purus gravida. Ut viverra fermentum diam eu mollis. Integer accumsan vitae massa et gravida."
    ],
    [
      "id"=> 7,
      "image"=> "maksim-larin-ezdrvzA1hZw-unsplash.jpg",
      "name"=> "Pink Lightning",
      "price"=> 80,
      "vat"=> 20,
      "description"=> "Aenean ac lorem non nisi vehicula luctus non sit amet nibh. Nam non urna cursus, tempor mi ac, porta massa. Mauris cursus arcu libero, sed commodo sapien elementum vitae. Aenean rhoncus ligula eu convallis tempus. Nulla suscipit a leo eu pharetra. Nam et ex nibh. Vivamus volutpat, elit non laoreet cursus, libero odio egestas elit, a consectetur justo urna in ligula. Nulla posuere orci massa. Nulla facilisi. In eu nulla eu quam viverra laoreet. Mauris accumsan quam at elit rutrum, id dictum quam tincidunt."
    ],
    [
      "id"=> 8,
      "image"=> "mohammad-metri-E-0ON3VGrBc-unsplash.jpg",
      "name"=> "Ridiluxe",
      "price"=> 2999,
      "vat"=> 20,
      "description"=> "Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer volutpat leo nulla, eget porta sapien tincidunt eu. Morbi lacinia nulla in erat blandit lacinia. Maecenas eros est, congue in lacinia et, vehicula quis orci. Suspendisse venenatis elit sed arcu molestie tincidunt. In ac pulvinar nulla, vitae elementum diam. Curabitur venenatis erat sed neque egestas, at auctor justo dapibus. Sed luctus rutrum quam ut elementum. Phasellus fermentum vitae tortor id interdum. Quisque ullamcorper turpis ac elit faucibus volutpat."
    ],
    [
      "id"=> 9,
      "image"=> "pat-taylor-12V36G17IbQ-unsplash.jpg",
      "name"=> "Top Boss",
      "price"=> 8590,
      "vat"=> 20,
      "description"=> "Phasellus mattis orci arcu, eget fringilla turpis accumsan at. Nam placerat enim neque, quis convallis augue porttitor quis. Proin ullamcorper tristique libero nec posuere. Pellentesque arcu elit, auctor vitae gravida dictum, tristique imperdiet diam. Vestibulum elementum, quam porttitor malesuada venenatis, ante odio volutpat neque, id efficitur sapien est quis massa. Phasellus a finibus leo. Donec vel molestie justo. Donec eu nunc egestas dui convallis facilisis. In feugiat mi sit amet convallis luctus. Fusce diam tellus, tempus a mauris non, blandit tempor ipsum. Proin ultricies a tortor nec elementum."
    ],
    [
      "id"=> 10,
      "image"=> "paul-gaudriault-a-QH9MAAVNI-unsplash.jpg",
      "name"=> "Humbly Cherry",
      "price"=> 49,
      "vat"=> 20,
      "description"=> "Nunc euismod lobortis rutrum. Proin pellentesque augue vitae volutpat blandit. Nulla eu nisl magna. Duis quis velit vestibulum, suscipit justo a, blandit sem. Proin varius imperdiet congue. Aenean dictum aliquet sem a pellentesque. Cras nec finibus leo. Pellentesque lorem velit, faucibus a libero vel, sollicitudin pretium augue. Morbi neque velit, euismod ut maximus nec, tempor ut dolor. Aenean ac cursus velit. Nunc eu efficitur ligula, sit amet tempus augue. Curabitur porta efficitur dapibus. Fusce laoreet luctus ipsum in viverra. Mauris augue ante, eleifend sed ultricies at, mollis et mi."
    ],
    [
      "id"=> 11,
      "image"=> "revolt-164_6wVEHfI-unsplash.jpg",
      "name"=> "Bloody Winner",
      "price"=> 125,
      "vat"=> 20,
      "description"=> "Ut a tellus arcu. Quisque rhoncus urna et nunc pellentesque molestie. Nulla facilisi. Donec semper feugiat tellus et iaculis. Aliquam tincidunt ante ac consequat eleifend. Nam et eros non sem consectetur commodo. Maecenas neque arcu, faucibus sed viverra hendrerit, malesuada quis eros."
    ],
    [
      "id"=> 12,
      "image"=> "wengang-zhai-_fOL6ebfECQ-unsplash.jpg",
      "name"=> "Red Climber",
      "price"=> 90,
      "vat"=> 20,
      "description"=> "Aliquam erat volutpat. Integer pharetra auctor quam, a imperdiet nibh facilisis vel. Fusce at nulla dictum, imperdiet augue eu, scelerisque est. Aenean vel porttitor diam. Suspendisse volutpat porttitor quam. Cras mattis blandit quam a luctus. Nulla malesuada interdum ante, sodales ullamcorper leo scelerisque vitae. Duis semper efficitur eros eget pellentesque."
    ],
    [
      "id"=> 13,
      "image"=> "giorgio-trovato-K62u25Jk6vo-unsplash.jpg",
      "name"=> "High Nose",
      "price"=> 69,
      "vat"=> 20,
      "description"=> "Integer fermentum, risus quis tincidunt porta, nisl lorem congue lorem, nec euismod dui sem at eros. Vivamus pretium nisi sed tristique pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper hendrerit ante imperdiet dapibus. Sed gravida malesuada erat ac posuere. Nulla viverra sem mi. Ut bibendum porta consequat. Praesent lacinia ut dolor ut varius."
    ],
    [
      "id"=> 14,
      "image"=> "charles-deluvio-1-nx1QR5dTE-unsplash.jpg",
      "name"=> "Rich Pilot",
      "price"=> 150,
      "vat"=> 20,
      "description"=> "Nunc sed iaculis leo. Donec pharetra finibus ullamcorper. Donec pharetra volutpat metus vel varius. Aliquam sollicitudin, dolor quis egestas gravida, arcu lorem dignissim justo, eget consectetur nisi elit non leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sagittis quis libero ac faucibus. Donec vehicula arcu pulvinar dui suscipit vehicula a sit amet eros. Vivamus imperdiet nunc vitae massa luctus vestibulum eu non nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;"
    ],
    [
      "id"=> 15,
      "image"=> "andres-hernandez-ouAyz-zRMTw-unsplash.jpg",
      "name"=> "Classic Smith",
      "price"=> 110,
      "vat"=> 20,
      "description"=> "Donec lobortis egestas posuere. Integer lobortis arcu quis arcu bibendum aliquet. In blandit lorem ac iaculis euismod. Proin sed elit rutrum mi tristique molestie. Donec in leo id metus placerat dictum et vehicula enim. Morbi tincidunt viverra varius. Etiam eget tempus arcu. Ut blandit sapien sem, in lobortis quam viverra a. Sed euismod massa sit amet mi venenatis vulputate. Aliquam pharetra vestibulum nibh, at porttitor nibh."
    ]
  ];

  
  public static function getAllProducts() {
    $products = json_decode(json_encode(self::$data), FALSE);
    return $products;
  }

  public static function getProductById($id) {
    $products = self::getAllProducts();
    foreach($products as $product) {
      if ($product->id == $id) {
        return $product;
      }
    }
    throw new Exception("Ce produit n'existe pas");
  }

  
}

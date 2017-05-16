# distance-between

# Installation

```
composer require vesic/distance-between
```

# Usage

```
require __DIR__ . '/vendor/autoload.php';

use Vesic\DistanceBetween\Distance;

$distance = new Distance;

$distance->addPlace('place|address');
$distance->addPlace('place|address');

var_dump($distance->getDifference()); // output in KM
```
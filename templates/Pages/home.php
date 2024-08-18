<?php
    require 'vendor/autoload.php';
    

   // use ccxt\ccxt;


// Get the list of all available exchanges
$exchanges = \ccxt\Exchange::$exchanges;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        AlgoTrader
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
           <h1>AlgoTrader</h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <h3>Exchanges</h3>
                <p>View the latest data from the exchanges</p>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Exchange</th>
                                <th>Domain</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                                
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

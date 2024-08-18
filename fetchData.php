<?php
                                
foreach ($exchanges as $exchange) {
    try {
        $exchange_class = '\\ccxt\\' . $exchange;
        $ex = new $exchange_class();
        
        // Fetch the BTC/USDT ticker (if the exchange supports it)
        if ($ex->has['fetchTicker']) {
            $ticker = $ex->fetch_ticker('BTC/USDT');
            
            // Check if the ticker data is available
            if ($ticker !== null && is_array($ticker)) {
                echo ' <tr>';
                echo '<td>' . $exchange . '</td>';
                echo '<td><a href="http://' . $ex->urls['www'] . '" target="_blank">' . $ex->urls['www'] . '</a></td>';
                echo '<td>' . $ticker['last'] . '</td>';
                echo '</tr>';
            } else {
                echo '<tr>';
                echo '<td>' . $exchange . '</td>';
                echo '<td><a href="http://' . $ex->urls['www'] . '" target="_blank">' . $ex->urls['www'] . '</a></td>';
                echo '<td>N/A</td>';
                echo '</tr>';
                }
        }
    } catch (\ccxt\NetworkError $e) {
        echo 'Network error: ' . $e->getMessage() . "\n";
    } catch (\ccxt\ExchangeError $e) {
        echo 'Exchange error: ' . $e->getMessage() . "\n";
    } catch (Exception $e) {
        echo 'An error occurred: ' . $e->getMessage() . "\n";
    }
}
                                    
?>
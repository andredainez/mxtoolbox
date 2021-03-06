<?php
/**
 * How to get additional information from IP address or domain name
 */
use MxToolbox\MxToolbox;
use MxToolbox\Exceptions\MxToolboxRuntimeException;
use MxToolbox\Exceptions\MxToolboxLogicException;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/MxToolbox/autoload.php';

try {

    $test = new MxToolbox();

    /**
     * Configure MxToolbox
     */
    $test
        // path to the dig tool - required
        ->setDig('/usr/bin/dig')
        // set dns resolver - required
        //->setDnsResolver('8.8.8.8')
        //->setDnsResolver('8.8.4.4')
        ->setDnsResolver('127.0.0.1');

    /* Get additional information for IP address
     *  Return array structure:
     *  ['ipAddress']
     *  ['domainName']
     *  ['ptrRecord']
     *  ['mxRecords'][array]
     */
    var_dump($test->getDomainInformation('8.8.8.8'));

} catch (MxToolboxRuntimeException $e) {
    echo $e->getMessage();
} catch (MxToolboxLogicException $e) {
    echo $e->getMessage();
}

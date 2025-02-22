<?php
/***************************************************************
*  Copyright notice
*
 * (c) 2014 DMK E-BUSINESS GmbH <dev@dmk-ebusiness.de>
 * All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

tx_rnbase::load('tx_t3socials_models_NetworkConfig');


/**
 * XING Configuration
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_twitter_NetworkConfig extends tx_t3socials_models_NetworkConfig
{


    /**
     * Initialisiert die Konfiguration für das Netzwerk.
     *
     * @return void
     */
    protected function initConfig()
    {
        parent::initConfig();
        $this->setProperty('provider_id', $this->uid = 'twitter');
        $this->setProperty('hybridauth_provider', 'Twitter');
        $this->setProperty('connector', 'tx_t3socials_network_twitter_Connection');
        $this->setProperty('communicator', 'tx_t3socials_mod_handler_Twitter');
        $this->setProperty(
            'description',
            'Please enter the customer key into the field "Username"' .
            ' and the customer secret into the field "Password".' . CRLF .
            ' ###MORE###' . CRLF .
            ' To authenticate with a specific account, you have to ' .
            ' put the customer token in the fields "access_token" and' .
            ' "access_token_secret" of the Configuration.' . CRLF .
            ' You can go to the T3Socials User Tools to autehtificate.' . CRLF .
            ' A customer end get the tokens from there.' . CRLF . CRLF .
            ' For a friction-free functionality without HybridAuth these fields are required in the configuration: ' . CRLF .
            ' CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET' . CRLF .
            ' The fields "Username" and "Password" can be ignored.'
        );
        $this->setProperty(
            'default_configuration',
            'twitter {' . CRLF .
                '    useHybridAuthLib = 1' . CRLF .
                '    access_token =' . CRLF .
                '    access_token_secret =' . CRLF .
            '}'
        );
    }
}

if (defined('TYPO3_MODE') &&
    $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/xing/class.tx_t3socials_network_xing_Connection.php']
) {
    include_once(
        $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/xing/class.tx_t3socials_network_xing_Connection.php']
    );
}

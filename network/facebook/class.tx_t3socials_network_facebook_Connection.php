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

tx_rnbase::load('tx_t3socials_network_hybridauth_Connection');


/**
 * Facebook Connector
 *
 * @package tx_t3socials
 * @subpackage tx_t3socials_network
 * @author Michael Wagner <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class tx_t3socials_network_facebook_Connection extends tx_t3socials_network_hybridauth_Connection
{

    /**
     * Liefert den Klassennamen der Message Builder Klasse
     *
     * @return string
     */
    protected function getBuilderClass()
    {
        return 'tx_t3socials_network_facebook_MessageBuilder';
    }

    /**
     * Liefert die Konfiguration für HybridAuth.
     *
     * @return array
     */
    public function getHybridAuthConfig()
    {
        $config = parent::getHybridAuthConfig();
        // für fb wird der app key nicht unter key, sondern unter id gesetzt
        $config['keys']['id'] = $config['keys']['key'];
        // FB braucht fürs auth nur den access_token!
        $accessToken = $this->getConfigData('access_token');
        if ($accessToken) {
            $config['keys']['access_token'] = $accessToken;
        }

        return $config;
    }
}

if (defined('TYPO3_MODE') &&
    $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/facebook/class.tx_t3socials_network_facebook_Connection.php']
) {
    include_once(
        $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3socials/network/facebook/class.tx_t3socials_network_facebook_Connection.php']
    );
}

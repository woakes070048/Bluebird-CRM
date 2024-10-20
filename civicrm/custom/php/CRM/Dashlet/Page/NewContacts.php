<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.4                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2013                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 * $Id$
 *
 */

/**
 * Main page for activity dashlet
 *
 */
class CRM_Dashlet_Page_NewContacts extends CRM_Core_Page {

  function browse() {
    $this->assign('admin', FALSE);
    $this->assign('context', 'dashlet');

    // also create the form element for the activity filter box
    $controller = new CRM_Core_Controller_Simple(
      'CRM_NYSS_Form_Integration_NewContactsFilter',
      ts('New Contacts Filter'),
      NULL,
      FALSE, FALSE, TRUE
    );
    $controller->setEmbedded(TRUE);
    $controller->run();
  }

  function preProcess() {
    $this->_action = CRM_Utils_Request::retrieve('action', 'String', $this, FALSE, 'browse');
    $this->assign('action', $this->_action);
  }

  /**
   *
   * @return none
   * @access public
   */
  function run( ) {
    //CRM_Core_Error::debug_var('account page $this', $this);
    //CRM_Core_Error::debug_var('account page $_REQUEST', $_REQUEST);

    $this->preProcess();
    $this->_id = CRM_Utils_Request::retrieve('id', 'Positive', $this);
    $this->browse();

    parent::run();
  }
}


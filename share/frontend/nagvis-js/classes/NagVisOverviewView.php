<?php
/*****************************************************************************
 *
 * NagVisOverviewView.php - Class for handling the map index page
 *
 * Copyright (c) 2004-2009 NagVis Project (Contact: info@nagvis.org)
 *
 * License:
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2 as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
 *
 *****************************************************************************/
 
/**
 * @author	Lars Michelsen <lars@vertical-visions.de>
 */
class NagVisOverviewView {
	private $CORE;
	
	/**
	 * Class Constructor
	 *
	 * @param 	GlobalCore 	$CORE
	 * @author 	Lars Michelsen <lars@vertical-visions.de>
	 */
	public function __construct($CORE) {
		$this->CORE = $CORE;
	}
	
	/**
	 * Parses the information for json
	 *
	 * @return	String 	String with Html Code
	 * @author 	Lars Michelsen <lars@vertical-visions.de>
	 */
	public function parse() {
		// Initialize template system
		$TMPL = New FrontendTemplateSystem($this->CORE);
		$TMPLSYS = $TMPL->getTmplSys();

		$aData = Array(
			'generalProperties' => $this->CORE->getMainCfg()->parseGeneralProperties(),
			'workerProperties' => $this->CORE->getMainCfg()->parseWorkerProperties(),
		);

		// Build page based on the template file and the data array
    // FIXME: Make template set configurable
		return $TMPLSYS->get($TMPL->getTmplFile('default', 'overview'), $aData);
	}
}
?>

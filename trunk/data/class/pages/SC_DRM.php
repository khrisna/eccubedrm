<?php
/*
 * This file is part of Mallkit's modification
 *
 * Copyright(c) 2009 Mallkit Inc. All Rights Reserved.
 *
 * http://mallkit.jp
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * DRM ライセンス発行処理クラス
 *
 * @author Mallkit Inc.
 * @version $Id: LC_Page_Shopping_DRM.php 1 2009-10-10 00:00:00Z $
 */
class SC_DRM {
	function SC_DRM() {
	}
	
	function issueLicense($email, $content_id, $policy_id) {
		echo $email, $content_id, $policy_id;
		$data = array('data' =>
"<?xml version='1.0' encoding='UTF-8'?>
<cypherinfo>
	<request>LICENSE</request>
	<reqtype>create</reqtype>
	<userid>" . $email . "</userid>
	<commodities>
		<commodity>
			<contentid>" . $content_id . "</contentid>
			<policyid>" . $policy_id . "</policyid>
		</commodity>
	</commodities>
</cypherinfo>"
);

	$url = "http://virgo.cypherlicense.com/matthias/servlet/CypherServer";
	$options = array('http' => array('method' => 'POST', 'content' => http_build_query($data)));
	$contents = file_get_contents($url, false, stream_context_create($options));
	echo $contents;
	}
}
?>

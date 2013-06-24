<?php
require_once("initialize.php");

												echo 'YOLO!!!!';
													session_start();
													$mainfunctions->DBLogin();
													$options = '';
													$query = mysql_query("SELECT * from Categoria");
													while ($row = mysql_fetch_array($query)) {
														$options .="<option>" .$row['nom']. "</option>";
													}
													$menu="<form id='filter' name='filter' method='post' action=''>
																<select name='filter' id='filter'>
																	" .$options. "
																</select>
															</form>";
													echo $menu;
												?>

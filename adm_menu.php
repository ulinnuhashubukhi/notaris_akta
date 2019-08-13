
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/favicon.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
						
							<?php
							$user8   = mysql_fetch_array(mysql_query("SELECT * FROM users where username = '$_SESSION[namauser]'"));
							?>
						
                            <p><?php echo "$user8[nama_lengkap]"; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
						<?php
						$user   = mysql_fetch_array(mysql_query("SELECT * FROM users where username = '$_SESSION[namauser]'"));
						
						if($user['tipe'] == 'staff'){
							
							$qry = mysql_query("SELECT * FROM menu where keterangan = 'staff'");
							
							while ($list1 = mysql_fetch_array($qry))
							{
								
								$list   = mysql_fetch_array(mysql_query("SELECT * FROM adm_menu where id = '$list1[id_menu]'"));
								
								if ($list['type']=='single')
								{
									echo "
									<li>
										<a href='?menu=$list[menu]'>
											<i class='fa $list[icon]'></i> <span>$list[judul]</span>
										</a>
									</li>
									";
								}
								else if ($list['type']=='single_kontak')
								{
									
									$kontak_msk = mysql_query("SELECT * FROM msg_inbox where status = '1'");	
									$kntk = mysql_num_rows($kontak_msk);
									
									echo "
									<li>
										<a href='?menu=$list[menu]'>
											<i class='fa $list[icon]'></i> <span>$list[judul]</span>
											";
											echo "<small class='badge pull-right bg-yellow'>$kntk</small>";
									echo "
										</a>
									</li>
									";
								}										
								elseif ($list['type']=='parent')
								{
									echo "<li class='treeview'>
											<a href='#'>
												<i class='fa $list[icon]'></i>
												<span>$list[judul]</span>
												<i class='fa fa-angle-left pull-right'></i>
											</a>
										";
									echo "<ul class='treeview-menu'>";
										$qchild = mysql_query("SELECT * FROM adm_menu WHERE parent = '$list[id]' ORDER BY id ASC");
										while ($child = mysql_fetch_row($qchild))
										{
											echo "<li><a href='?menu=$child[5]'><i class='fa fa-angle-double-right'></i> $child[1]</a></li>";
											// }
										}
									echo "</ul></li>";	
								}
							}
							
						}elseif($user['tipe'] == 'notaris'){
							
							$qry = mysql_query("SELECT * FROM menu where keterangan = 'notaris'");
							
							while ($list1 = mysql_fetch_array($qry))
							{
								
								$list   = mysql_fetch_array(mysql_query("SELECT * FROM adm_menu where id = '$list1[id_menu]'"));
								
								if ($list['type']=='single')
								{
									echo "
									<li>
										<a href='?menu=$list[menu]'>
											<i class='fa $list[icon]'></i> <span>$list[judul]</span>
										</a>
									</li>
									";
								}
								else if ($list['type']=='single_kontak')
								{
									
									$kontak_msk = mysql_query("SELECT * FROM msg_inbox where status = '1'");	
									$kntk = mysql_num_rows($kontak_msk);
									
									echo "
									<li>
										<a href='?menu=$list[menu]'>
											<i class='fa $list[icon]'></i> <span>$list[judul]</span>
											";
											echo "<small class='badge pull-right bg-yellow'>$kntk</small>";
									echo "
										</a>
									</li>
									";
								}										
								elseif ($list['type']=='parent')
								{
									echo "<li class='treeview'>
											<a href='#'>
												<i class='fa $list[icon]'></i>
												<span>$list[judul]</span>
												<i class='fa fa-angle-left pull-right'></i>
											</a>
										";
									echo "<ul class='treeview-menu'>";
										$qchild = mysql_query("SELECT * FROM adm_menu WHERE parent = '$list[id]' ORDER BY id ASC");
										while ($child = mysql_fetch_row($qchild))
										{
											echo "<li><a href='?menu=$child[5]'><i class='fa fa-angle-double-right'></i> $child[1]</a></li>";
											// }
										}
									echo "</ul></li>";	
								}
							}
						
						}else{
							
							$qry = mysql_query("SELECT * FROM adm_menu ORDER BY id");
							$count = mysql_num_rows($qry);
							if ($count > 0)
							{
								$no=0;
								while ($list = mysql_fetch_array($qry))
								{
									
										if ($list['type']=='single')
										{
											echo "
											<li>
												<a href='?menu=$list[menu]'>
													<i class='fa $list[icon]'></i> <span>$list[judul]</span>
												</a>
											</li>
											";
										}
										else if ($list['type']=='single_kontak')
										{
											
											$kontak_msk = mysql_query("SELECT * FROM msg_inbox where status = '1'");	
											$kntk = mysql_num_rows($kontak_msk);
											
											echo "
											<li>
												<a href='?menu=$list[menu]'>
													<i class='fa $list[icon]'></i> <span>$list[judul]</span>
													";
													
													echo "<small class='badge pull-right bg-yellow'>$kntk</small>";
													
											echo "
												</a>
											</li>
											";
										}										
										elseif ($list['type']=='parent')
										{
											echo "<li class='treeview'>
													<a href='#'>
														<i class='fa $list[icon]'></i>
														<span>$list[judul]</span>
														<i class='fa fa-angle-left pull-right'></i>
													</a>
												";
											echo "<ul class='treeview-menu'>";
												$qchild = mysql_query("SELECT * FROM adm_menu WHERE parent = '$list[id]' ORDER BY id ASC");
												while ($child = mysql_fetch_row($qchild))
												{
													echo "<li><a href='?menu=$child[5]'><i class='fa fa-angle-double-right'></i> $child[1]</a></li>";
													// }
												}
											echo "</ul></li>";	
										}
									$no++;	
									// }	
								}
									
							}
						}
						
						?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
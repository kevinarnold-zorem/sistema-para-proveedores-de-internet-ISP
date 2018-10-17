  <?php     
    $login=new Cliente(new Connexion);
    $res=$login->getAll();

   $num=1;
                          while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))  
                          {  
                              
                              echo "<tr>";

                                  echo  "<td>".$num."</td>";

                                    echo "<td>".$row["nombre"]."</td>";  
                                    echo "<td>". $row["dni"]."</td>"; 
                                     echo "<td>";
                                      if($row["aud_anulado"]=="true"){
                                     echo "<a class='btn btn-warning btn-outline btn-xs'>activo</a>";
                                     echo " ";
                                     echo "<a href='?view=Cliente&type=abonar&id=".$row['pk_cliente']."' class='btn btn-success btn-outline btn-xs'>Gestionar</a>";
                                      } else if($row["aud_anulado"]=="false") {
                                        echo "<a class='btn btn-danger btn-outline btn-xs'>inactivo</a>";
                                        
                                      }

                                    echo "</td>";

                                    echo "<td><a href='?view=Cliente&type=Editar&id=". $row['pk_cliente']."' class='btn btn-warning btn-outline btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
                                    <a onclick='Delete(". $row['pk_cliente'].");' class='btn btn-danger btn-outline btn-xs'><i class='glyphicon glyphicon-trash'></i></a>        
                                    </td>";

                               echo "</tr>";  
                             
                               $num++;
                          }  


                          ?>  
<?php
  include "connectdb.php";
  
?>
<div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-arrows="true" data-thumbs="true">
  <div class="flexslider">
    <div class="slider-wrap">
      <?php
        $sql= 'SELECT * from slide';
        $result = mysqli_query($conn,$sql);
        if (isset($result)) {
          while ($slide= mysqli_fetch_array($result)) {
            $img= $slide['link_slide'];
            $vid= $slide['link_vid'];
            $text_up= $slide['text_up'];
            $text_down= $slide['text_down'];
            $rate= $slide['rate_slide'];
            $hid= $slide['hidden'];
            if ($hid == 0) {
                if (!isset($vid)) {
                  echo '<div class="slide" data-thumb="'.$img.'" >';
                    echo '<a href="#">';
                      echo '<img src="'.$img.'" alt="" >';
                      echo '<div class="overlay">';
                        echo '<div class="text-overlay">';
                          echo '<div class="text-overlay-title">';
                            echo '<h3>'.$text_up.'</h3>';
                          echo '</div>';
                          echo '<div class="text-overlay-meta">';
                            if (isset($text_down)) {
                              echo '<span >'.$text_down.'</span>';
                              echo '</div>';
                            }
                            if (isset($rate)) {
                              $nuasao= '<i class="icon-star-half-full"></i>';
                              $motsao= '<i class="icon-star3"></i>';
                              switch ($rate) {
                                
                                case 0.5:
                                  echo '<span>'.$nuasao.'</span>';
                                  echo '</div>';
                                  break;
                                case 1:
                                  echo '<span>'.$motsao.'</span>';
                                  echo '</div>';
                                  break;
                                case 1.5:
                                  echo '<span>'.$nuasao.'</span>';
                                  echo '</div>';
                                  break;
                                case 2:
                                  echo '<span>'.$motsao.$motsao.'</span>';
                                  echo '</div>';
                                  break;
                                case 2.5:
                                  echo '<span>'.$motsao.$motsao.$nuasao.'</span>';
                                  echo '</div>';
                                  break;
                                case 3:
                                  echo '<span>'.$motsao.$motsao.$motsao.'</span>';
                                  echo '</div>';
                                  break;
                                case 3.5:
                                  echo '<span>'.$motsao.$motsao.$motsao.$nuasao.'</span>';
                                  echo '</div>';
                                  break;
                                case 4:
                                  echo '<span>'.$motsao.$motsao.$motsao.$motsao.'</span>';
                                  echo '</div>';
                                  break;
                                case 4.5:
                                  echo '<span>'.$motsao.$motsao.$motsao.$motsao.$nuasao.'</span>';
                                  echo '</div>';
                                  break;
                                case 5:
                                  echo '<span>'.$motsao.$motsao.$motsao.$motsao.$motsao.'</span>';
                                  echo '</div>';
                                  break;


                                default:
                                  echo '<span>'.'</span>';
                                  echo '</div>';
                                  break;
                              }
                            }
                          
                          echo '</div>';
                        echo '</div>';
                        echo  '</a>';
                      echo '</div>';
                } else {
                  echo '<div class="slide" data-thumb="'.$img.'" >';
                  echo ' <iframe src="'.$vid.'" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                  echo '</div>';
                }
              } else {
                echo '';
              }
          }
            
        }
        
      ?>
    </div>
  </div>
</div>


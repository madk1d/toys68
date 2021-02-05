<?php
// Количество новостей на странице
$on_page = 6;


$result  =  mysqli_query( $base,  "SELECT COUNT(*) FROM toys WHERE picf='".$type."'");
// Получаем количество записей таблицы news

$count_records = mysqli_fetch_assoc($result);
$count_records = $count_records['COUNT(*)'];


// Получаем количество страниц
// Делим количество записей на количество новостей на странице
// и округляем в большую сторону
$num_pages = ceil($count_records / $on_page);


// Текущая страница из GET-параметра page
// Если параметр не определен, то текущая страница равна 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Если текущая страница меньше единицы, то страница равна 1
if ($current_page < 1)
{
	$current_page = 1;
}
// Если текущая страница больше общего количества страница, то
// текущая страница равна количеству страниц
elseif ($current_page > $num_pages)
{
	$current_page = $num_pages;
}

// Начать получение данных от числа (текущая страница - 1) * количество записей на странице
$start_from = ($current_page - 1) * $on_page;


// Вывод результатов
							$query = "SELECT * FROM toys WHERE picf='".$type."' ORDER BY id DESC LIMIT ".$start_from.",".$on_page;
							$result  =  mysqli_query( $base,$query);

						//$result  =  mysqli_query( $base,  "SELECT * FROM toys WHERE type='".$type."' ORDER BY id ASC");
									if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
										else {
												$div_class="col-4";
													while ( $row = mysqli_fetch_assoc($result) ){
														echo "<div class='".$div_class."'><span class='image fit' style='text-align:center'><a href='/order/".$row['id']."/'><img src='/images/".$row['picf']."/".$row['picn'].".jpg' alt='".$row['name']."' /></a><span style='font-size:0.8em;'>".$row['name']."</span><br/><span style='font-size:0.7em;'>высота: ".$row['height']."см</span><br/><i class='fa fa-search-plus' aria-hidden='true'></i> <span style='font-size:0.8em;'><a href='/order/".$row['id']."/'><!--noindex-->подробнее...<!--/noindex--></a></span></span></div>";
														echo "\n";
														}
											}
									mysqli_close($base);
?>
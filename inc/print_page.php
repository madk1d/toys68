<?php


// Вывод списка страниц
if ($num_pages>1) {
	echo "<div style='text-align:center;margin-top:5em;font-size:0.9em;'>";
	echo "<span>Cтраница: </span>";
	
for ($page = 1; $page <= $num_pages; $page++)
{
	if ($page == $current_page)
	{
		echo "<span style='background-color: #DCDCDC;padding: 3px 4px;font-weight:bold;margin:4px;border: 1px solid black;'>".$page."</span>";
	}
	else
	{
		echo "<a class='icon' href='?page=".$page."'><span style='padding: 3px 4px;margin:4px;font-weight:bold;'>".$page."</span></a>";
	}
}	
//echo "<span style='margin:0px;'></span>";
echo "</div>";
}						

?>
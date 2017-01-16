<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php
$items[0] = ['id' => 1, 'name' => 'item 1', 'parent_id' => 0];
$items[1] = ['id' => 2, 'name' => 'item 2', 'parent_id' => 0];
$items[2] = ['id' => 3, 'name' => 'subItem 1', 'parent_id' => 2];
$items[3] = ['id' => 4, 'name' => 'subItem 2', 'parent_id' => 2];
$items[4] = ['id' => 5, 'name' => 'subItem 1', 'parent_id' => 4];
$items[5] = ['id' => 6, 'name' => 'subItem 3', 'parent_id' => 2];
$items[6] = ['id' => 7, 'name' => 'subItem 1', 'parent_id' => 6];
$items[7] = ['id' => 8, 'name' => 'item 3', 'parent_id' => 0];
$items[8] = ['id' => 9, 'name' => 'subItem 1', 'parent_id' => 8];
$items[9] = ['id' => 10, 'name' => 'item 4', 'parent_id' => 0];

// var_dump($items);

$level = 0;

function r($items, $level)
	{
	if (($level < count($items)) && (($items[$level]['parent_id']) > 0))
		{
		$key = array_search($items[$level]['parent_id'], array_column($items, 'id'));
		if (($items[$key]['parent_id']) > 0)
			{
			$r = "<ol type=\"i\">";
			}
		  else
			{
			$r = "<ol type=\"a\">";
			}
		}
	  else
		{
		$r = "<ol>";
		}

	foreach($items as $i)
		{
		if ($i['parent_id'] == $level)
			{
			$r = $r . "<li>" . $i['name'] . r($items, $i['id']) . "</li>";
			}
		}

	$r = $r . "</ol>";
	$r = str_replace("<ol></ol>", "", $r);
	return $r;
	}

print r($items, $level);
?>

 </body>
</html>
<?php
function getCoffeeBreaks (){
    global $dbh;
    $query = "
        SELECT CoffeeBreak.room, CoffeeBreak.start_time, Menu.meat, Menu.veggie, Menu.vegan, Menu.gluten_free, Activity.end_time
        FROM CoffeeBreak
        JOIN Menu ON CoffeeBreak.menu_id = Menu.menu_id
        JOIN Activity ON CoffeeBreak.room = Activity.room AND CoffeeBreak.start_time = Activity.start_time
    ";
    return $dbh->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function formatMenuList($list) {
    $list_frm = str_replace(", ", "<br>• ", $list);
    return "• " . $list_frm;
}
?>
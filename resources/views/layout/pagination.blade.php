
<style>   
    table {  
        border-collapse: collapse;  
    }  
    .inline{   
        display: inline-block;   
        float: right;   
        margin: 20px 0px;   
    }   

    input, button{   
        height: 34px;   
    }   

    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
        background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
</style>  
<?php $sk=$skip-$limit;
$nxt=$page*$limit;?>
<tfoot><tr><td colspan="3" style="text-align:center; ">
    <div class="pagination">    <?php if ($page >= 2) { ?> 
        <a href='{{url($url.'/'.$id.'/'.$sk.'/'.$limit.'?keyword='.$keyword)}}'>  Prev </a>
<?php
}

for ($i = 1; $i <= $total_pages; $i++) {
    $val = $limit * $i - $limit;
    if ($i == $page) {
        ?>

        <a href='{{url($url.'/'.$id.'/'.$val.'/'.$limit.'?keyword='.$keyword)}}' class = 'btn-info'> {{$i}} </a>
<?php
} else {
    ?>
    <a href='{{url($url.'/'.$id.'/'.$val.'/'.$limit.'?keyword='.$keyword)}}'> {{$i}} </a>
<?php
}
};


if ($page < $total_pages) {
    ?> 
    <a href='{{url($url.'/'.$id.'/'.$nxt.'/'.$limit.'?keyword='.$keyword)}}'>  Next </a>
<?php }
?></div></td></tr></tfoot>
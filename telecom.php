<HTML>

    <HEAD>

        <TITLE>Telecom Site</TITLE>
        <link rel="stylesheet" href="style2.css">


        <SCRIPT LANGUAGE="JavaScript">



dvds=new Array();

types=new Array();

var index=0;



<?php

try {

   

    $dbh = new PDO("sqlite:Telecm5.db");





$sql = "SELECT * FROM tel;";



 foreach ($dbh->query($sql) as $row)

        {

   if( $row['stock']>0)   

  print 'dvds[index++]="#'.$row['name'] ."#".$row['id']. "#". $row['price']."#".$row['stock']."#".$row['genre']. "#".$row['director']. '#";';



}

    

    $dbh = null;

    }

catch(PDOException $e)

    {

    echo $e->getMessage();

    }

?>





function load()

    {

items= new Array();

types.push();

for( var i=0;i<index;i++){

items=dvds[i].split('#');

document.myDVD.dvdsel.add(new Option(items[1]));

if(!types.includes(items[5]))types.push(items[5]);



}

types.sort();

for( var i=0;i<types.length;i++)document.myDVD.typesel.add(new Option(types[i]));

document.myDVD.typesel.selectedIndex=0;

    }

function List_again(){

var j=document.myDVD.dvdsel.options.length;

for( var i=0;i<j;i++)

document.myDVD.dvdsel.options.remove(0);

items= new Array();

for( var i=0;i<index;i++){

items=dvds[i].split('#');

if((document.myDVD.typesel.selectedIndex==0)||(items[5]==document.myDVD.typesel.options [document.myDVD.typesel.selectedIndex].value))document.myDVD.dvdsel.add(new Option(items[1]));

}



}

function Add_Basket()

    {

document.myDVD.Dname.value=document.myDVD.dvdsel.options [document.myDVD.dvdsel.selectedIndex].value;

}
function Buy()

    {
items= new Array();



for( var i=0;i<index;i++){

items=dvds[i].split('#');

if(items[1]==document.myDVD.Dname.value){
document.realForm.Dname.value=document.myDVD.Dname.value;
document.realForm.ID.value=items[2];
document.realForm.submit();	


}

}

}




    </SCRIPT>

 </HEAD>

<?php

try {

   

    $dbh = new PDO("sqlite:Telecm5.db");



if(isset($_GET['ID'])){

$ID=$_GET['ID'];

$sql = "SELECT * FROM tel where id='".$ID."'";



 foreach ($dbh->query($sql) as $row)

        {

        $data=$row['stock'];

        if($data>0)$data--;

        

        print 'Bought='.$row['name']. ' ,  '.'Product Type="'.$row['director']. '"'.$data.' <br>';
$sql2="UPDATE tel SET stock=".$data." where id='".$ID."'";

$dbh->exec($sql2);

print $sql2.'<br>';

}



}
if(isset($_GET['Dname'])){

    $name=$_GET['Dname'];
    
    $sql = "SELECT * FROM tel where name='".$name."'";
    
    
    
     foreach ($dbh->query($sql) as $row)
    
            {
    
            $data=$row['stock'];
    
            if($data>0)$data--;
    
            
    
             
    
    
    
    $sql2="UPDATE tel SET stock=".$data." where name='".$name."'";
    
    $dbh->exec($sql2);
    
    
    
    }
    
    
    
    }


 

    $dbh = null;

    }

catch(PDOException $e)

    {

    echo $e->getMessage();

    }

?>



  

    <BODY onload='load()'>




 
   <form name="realForm" action="pay.html" method="get"> 
   <input type="hidden" name="ID" /></p>
   <input type="hidden" name="Dname" /></p>
       </FORM>
<form name="myDVD" >
           <SELECT NAME='dvdsel' > </SELECT>    

  <INPUT type='button' name='DVD_type' value='List by Genre' OnClick='List_again()'>

  <INPUT type='button' name='DVD_basket' value='Add to Basket' OnClick='Add_Basket()'>

  <SELECT NAME='typesel' > </SELECT> 





 <p>Please input device name: <input type="text" name="Dname" /></p>



 <p><input type="button" value='Buy' OnClick='Buy()'></p>
 
        </FORM>

    </BODY>

</HTML>

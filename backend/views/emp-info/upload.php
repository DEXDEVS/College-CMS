<?= 
\kato\DropZone::widget([
		'options' => [
	        'init' => "function(){
	        	   	renameFile : function (file) {
			        //file.name = new Date().getTime() + '_' + file.name;
			        return file.renameFile = 'kinzzz.' + file.split('_').pop();
			    }

	        }",
	         'url'=> 'index.php?r=emp-info/upload',
	           'maxFilesize' => '1',
	           'addRemoveLinks' =>true,
	            'acceptedFiles' =>'image/*',    


        ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
	          // 'removedfile' => "function(file){alert(file.name + ' is removed')}"
	           'removedfile' => "function(file){
	             alert('Delete this file?');
	            $.ajax({
	               url: 'index.php?r=emp-info/rmf',
	               type: 'GET',
	               data: { 'filetodelete': file.name}
          		});

            }"
       ],

       // 'options' => [
       // 	'url'=> 'index.php?r=emp-info/upload',
       //  'maxFilesize' => '2',
       // ],
       // 'clientEvents' => [
       //     'complete' => "function(file){console.log(file)}",
       //     'removedfile' => "function(file){alert(file.name + ' is removed')}"
       // ],
   ]);

?>
<?php $this->layout('bo', ['title' => 'Ajout d\'articles']) ?>

<?php $this->start('main_content') ?>
<p>Uploadez le fichier json correspondant à l'article</p>
<?php $this->insert('includes/flashmessages', array('fmsg' => $fmsg)); ?>

<form action="<?php echo baseUrl('admin'); ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="InputJson">
			Json du ou des articles
		</label>
		<input type="file" name="json" id="InputJson"/><br/>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Ajouter</button>
		</div>
		<p class="help-block">Le format attendu est le suivant : <br>
			<pre>
{ 
	"1": {
		"id": 1,
		"title": "Doloribus vel ipsum et qui.",
		"content": "Repellendus tenetur et nam ratione nostrum temporibus. Doloremque quia provident voluptates sunt illum. Doloremque quod nesciunt quo vel.\n\nId dolorem id cumque sed sunt. Doloribus voluptates tempora ipsum non cumque atque. Saepe eius id et consectetur iusto. Deleniti qui nisi nihil quod eligendi sed.",
		"date_add": "1973-03-09 04:43:58",
		"author": "\u00c9l\u00e9onore du Lebreton"
	},
	"2": {
		"id": 2,
		"title": "Ea est aut voluptatibus voluptas consequuntur.",
		"content": "Aut et inventore dignissimos voluptatibus accusamus et iusto. Temporibus delectus libero voluptatibus reiciendis assumenda qui quia. Exercitationem animi molestiae perspiciatis voluptates et laudantium. Molestiae delectus esse voluptatem nemo et eos libero.\n\nConsequuntur enim autem illum magnam quaerat nisi. Laboriosam quidem id voluptas mollitia laboriosam non quia. Aut veritatis aperiam quis. Optio corporis quia recusandae eligendi dolore nam sit.",
		"date_add": "1971-09-04 04:30:11",
		"author": "Olivie du Gaillard"
	}
}
			</pre>
		</p>
	</div>

</form>
<?php $this->stop('main_content') ?>

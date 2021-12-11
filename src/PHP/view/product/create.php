<form method="post" action='index.php?action=created'>
    <fieldset>
        <legend>Add a product:</legend>
            <p>
                <label for="immat_id">Name</label> :
                <input type="text" placeholder="A" name="name" id="name_id" required/>
            </p>
            <p>
                <label for="marq_id">Price (€)</label> :
                <input type="text" placeholder="10" name="price" id="price_id" required/>
            </p>
            <p>
                <label for="coul_id">Description</label> :
                <input type="text" placeholder="blablabla" name="description" id="desc_id" required/>
            </p>
            <p>
                <label for="coul_id">Image</label> :
                <input type="text" placeholder="link" name="image" id="image_id" required/>
            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
    </fieldset>
</form>
<form method="post" action='index.php?action=created'>
    <fieldset>
        <legend>Add a product:</legend>
            <p>
                <label for="name_id">Name</label> :
                <input type="text" placeholder="A" name="name" id="name_id" required/>
            </p>
            <p>
                <label for="price_id">Price (€)</label> :
                <input type="text" placeholder="10" name="price" id="price_id" required/>
            </p>
            <p>
                <label for="desc_id">Description</label> :
                <input type="text" placeholder="blablabla" name="description" id="desc_id" required/>
            </p>
            <p>
                <label for="image_id">Image</label> :
                <input type="text" placeholder="link" name="image" id="image_id" required/>
            </p>
            <p>
                <input type="submit" value="Confirm" />
            </p>
    </fieldset>
</form>
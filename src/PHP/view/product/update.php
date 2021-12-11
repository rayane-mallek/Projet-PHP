<form method="post" action='index.php?action=updated'>
    <fieldset>
        <legend>Edit a product:</legend>
            <p>
                <label for="name_id">Name</label> :
                <input type="text" value="<?= htmlentities($p->getName())?>" name="name" id="name_id" readonly/>
            </p>
            <p>
                <label for="price_id">Price (€)</label> :
                <input type="text" value="<?= htmlentities($p->getPrice())?>" name="price" id="price_id" required/>
            </p>
            <p>
                <label for="desc_id">Description</label> :
                <input type="text" value="<?= htmlentities($p->getDescription())?>" name="description" id="desc_id" required/>
            </p>
            <p>
                <label for="image_id">Image</label> :
                <input type="text" value="<?= htmlentities($p->getImage())?>" name="image" id="image_id" required/>
            </p>
            <p>
                <input type="submit" value="Confirm" />
            </p>
    </fieldset>
</form>
<form method="GET" style="text-align:center; margin-bottom:2rem;">
  <label for="ingredient">Filter op ingrediënt:</label>
  <select name="ingredient" onchange="this.form.submit()">
    <option value="">-- Alles --</option>
    <?php
    $terms = get_terms('ingredienten');
    foreach ($terms as $term) {
      $selected = isset($_GET['ingredient']) && $_GET['ingredient'] === $term->slug ? 'selected' : '';
      echo "<option value='{$term->slug}' $selected>{$term->name}</option>";
    }
    ?>
  </select>
</form>

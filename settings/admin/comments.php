<?php

    function commentsItems($last_name, $review){

        $start_table = "<table class='form-table editcomment' role='presentation'><tbody>";
        $end_table = "</tbody></table>";

        $last_name = "
            <tr>
                <td class='first'>
                    <label for='last_name'>Apellido</label>
                </td>
                <td>
                    <input type='text' name='newcomment_author_last_name' size='30' value='$last_name' id='last_name' disabled style='width: 100%'>
                </td>
            </tr>";

        $review = "
            <tr>
                <td class='first'>
                    <label for='last_name'>Review</label>
                </td>
                <td>
                    <input type='number' name='review' size='30' value='$review' id='review' disabled style='width: 100%'>
                </td>
            </tr>";

        $all_items = $start_table . $last_name . $review . $end_table;

        return $all_items;

    }
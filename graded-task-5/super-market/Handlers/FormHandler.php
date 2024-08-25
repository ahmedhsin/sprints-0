<?php

class FormHandler
{

    public function create_form_model($modal_title,$modal_id, $formInputs, $formAction, $formMethod, $formEnctype = "multipart/form-data")
    {
        $modal_header = '<div class="modal fade" id="'.$modal_id.'" tabindex="-1" aria-labelledby="'.$modal_id.'Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="'.$modal_id.'Label">'.$modal_title.' <?php echo $title?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">';
        $form = "<form method='$formMethod' action='$formAction' enctype='$formEnctype'>";
        foreach ($formInputs as $input) {
            $form .= $this->create_input($input['name'], $input['type'], $input['hidden'], $input['value']);
        }

        $modal_footer = '</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>';
        $form .= $modal_footer;
        $form .= "</form></div>";
        echo $modal_header.$form;

    }

    public function create_form($formInputs,$submit_text, $formAction, $formMethod, $formEnctype = "multipart/form-data")
    {
        $form = "<form method='$formMethod' action='$formAction' enctype='$formEnctype'>";
        foreach ($formInputs as $input) {
            $form .= $this->create_input($input['name'], $input['type'], $input['hidden'], $input['value']);
        }

        $submit = '<button type="submit" class="btn btn-primary">'.$submit_text.'</button>';
        $form .= $submit;
        $form .= "</form>";
        echo $form;
    }

    public function create_input($name,$type, $hidden=false, $value = '')
    {
        $label = '<label for="'.$name.'" class="col-sm-2 col-form-label"
                >'.$name.'</label>';
        if ($hidden) {
            $label = '';
        }
        $input = '<input
                        type="'.$type.'"
                        class="form-control"
                        id="'.$name.'"
                        name="'.$name.'"
                        value="'.$value.'"
                        required
                        '.($hidden ? 'hidden' : '').'
                />';
        return '<div class="row mb-3">
                    '.$label.'
                    <div class="col-sm-10">
                        '.$input.'
                    </div>
                </div>';
    }
}
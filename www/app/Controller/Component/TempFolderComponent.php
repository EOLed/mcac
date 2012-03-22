<?php
class TempFolderComponent extends Component {
    function mkdir() {
        $folder = TMP . date("Ymd");

        if (!file_exists($folder))
            mkdir($folder, 0777, true);

        return $folder;
    }
}

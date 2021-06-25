<?php
    function verifyExtensionReclamation($_name, $_extension, $_FileSize, $_temporaryDirectory, $_profilFirstName, $_profilLastName){
        $extension_upload= str_replace(".", "", strrchr ( $_name , "." ));
        if(in_array ($extension_upload, $_extension)){
            if($_FileSize <= 4000000){
                $newFileName = "reclamation/".strtolower($_profilLastName."".$_profilFirstName.".".$extension_upload);
                $resultat = move_uploaded_file($_temporaryDirectory, $newFileName);
                if($resultat){
                    return true;

                }else{
                    return "upload_error";
                }
            }else{
                return "size_error";
            }
        }else{
            return "extension_error";
        }
    }

    function getFilePathReclamation($_name, $_extension, $_profilFirstName, $_profilLastName){
        $extension_upload= str_replace(".", "", strrchr ( $_name , "." ));
        $newFileName = "reclamation/".strtolower($_profilLastName."".$_profilFirstName.".".$extension_upload);
        return $newFileName;
    }

    function verifyExtensionEvaluation($_name, $_extension, $_FileSize, $_temporaryDirectory, $_profilFirstName, $_profilLastName){
        $extension_upload= str_replace(".", "", strrchr ( $_name , "." ));
        if(in_array ($extension_upload, $_extension)){
            if($_FileSize <= 4000000){
                $newFileName = "demande_evaluation/".strtolower($_profilLastName."".$_profilFirstName.".".$extension_upload);
                $resultat = move_uploaded_file($_temporaryDirectory, $newFileName);
                if($resultat){
                    return true;

                }else{
                    return "upload_error";
                }
            }else{
                return "size_error";
            }
        }else{
            return "extension_error";
        }
    }

    function getFilePathEvaluation($_name, $_extension, $_profilFirstName, $_profilLastName){
        $extension_upload= str_replace(".", "", strrchr ( $_name , "." ));
        $newFileName = "demande_evaluation/".strtolower($_profilLastName."".$_profilFirstName.".".$extension_upload);
        return $newFileName;
    }
?>
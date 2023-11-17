<?php
    // require_once '../Core/header.php';

    // $data = fetchAll("SELECT * FROM nihlist");
    // if(count($data) === 0) {
    //     $listPath = __root . "/nihList.xml";
    //     $listXML = simplexml_load_file($listPath);

    //     $repeated = str_repeat("?, ", 15);
    //     foreach ($listXML->item as $item) {
    //         execute("INSERT INTO `nihlist` VALUES 
    //             ($repeated ?)", [
    //                 (string)$item->sn,
    //                 (string)$item->no,
    //                 (string)$item->ccmaName,
    //                 (string)$item->crltsnoNm,
    //                 (string)$item->ccbaMnm1,
    //                 (string)$item->ccbaMnm2,
    //                 (string)$item->ccbaCtcdNm,
    //                 (string)$item->ccsiName,
    //                 (string)$item->ccbaAdmin,
    //                 (string)$item->ccbaKdcd,
    //                 (string)$item->ccbaCtcd,
    //                 (string)$item->ccbaAsno,
    //                 (string)$item->ccbaCncl,
    //                 (string)$item->ccbaCpno,
    //                 (string)$item->longitude,
    //                 (string)$item->latitude
    //             ]);
    //     }
        

    // }

    // $data = fetchAll("SELECT * FROM nihdetail");
    // if(count($data) === 0) {
    //     $dir = scandir(__root . "/detail");
    //     $repeated = str_repeat("?, ", 25);
    //     foreach($dir as $filename) {
    //         if(in_array($filename, [".", ".."])) continue;
    //         $itemPath = __root . "/detail/" . $filename;
    //         $itemXML = simplexml_load_file($itemPath);
            
    //         execute("INSERT INTO `nihdetail` VALUES 
    //             ($repeated ?)", [
    //                 (string)$itemXML->ccbaKdcd,
    //                 (string)$itemXML->ccbaAsno,
    //                 (string)$itemXML->ccbaCtcd,
    //                 (string)$itemXML->ccbaCpno,
    //                 (string)$itemXML->longitude,
    //                 (string)$itemXML->latitude,
    //                 (string)$itemXML->item->ccmaName,
    //                 (string)$itemXML->item->crltsnoNm,
    //                 (string)$itemXML->item->ccbaMnm1,
    //                 (string)$itemXML->item->ccbaMnm2,
    //                 (string)$itemXML->item->gcodeName,
    //                 (string)$itemXML->item->bcodeName,
    //                 (string)$itemXML->item->mcodeName,
    //                 (string)$itemXML->item->scodeName,
    //                 (string)$itemXML->item->ccbaQuan,
    //                 (string)$itemXML->item->ccbaAsdt,
    //                 (string)$itemXML->item->ccbaCtcdNm,
    //                 (string)$itemXML->item->ccsiName,
    //                 (string)$itemXML->item->ccbaLcad,
    //                 (string)$itemXML->item->ccceName,
    //                 (string)$itemXML->item->ccbaPoss,
    //                 (string)$itemXML->item->ccbaAdmin,
    //                 (string)$itemXML->item->ccbaCncl,
    //                 (string)$itemXML->item->ccbaCndt,
    //                 (string)$itemXML->item->imageUrl,
    //                 (string)$itemXML->item->content
    //             ]);

    //     }
    // }
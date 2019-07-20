<?php

namespace App\Traits;

use App\Model\Collect;

trait PdfPerso
{
    /**
     * fonction de création de bon de collect en pdf
     *
     * @param string action de retour du pdf (download, stream, save)
     *
     * @param int id de la collecte
     *
     * @return pdf le pdf avec l'action souhaité
     *
     */
    public function pdfCollect($return, $id)
    {
        $action = $return;
        $collectId = $id;

        $collect = Collect::find($collectId);
        if (!$collect) {
            return false;
        }
        $partner = $collect->partner;
        $articles = $collect->article;
        $collectPdf['collectedAt'] = $collect->collected_at;
        $collectPdf['partnerName'] = $partner->name;
        $collectPdf['partnerAdress'] = $partner->address;
        $collectPdf['partnerTel'] = $partner->tel;
        $collectPdf['partnerCp'] =  $partner->villeFrance->ville_code_postal;
        $collectPdf['partnerCity'] = $partner->villeFrance->ville_nom_reel;
        if ($collect->status_id == 2) {
            $collectPdf['articles'] = '';
        } elseif ($collect->status_id == 3) {
            $i = 1;
            foreach ($articles as $article) {
                foreach ($article->associationArticle as $assoc) {
                    $collectPdf['articles'][$i]['name'] = $article->name;
                    $collectPdf['articles'][$i]['category'] = $article->category->name;
                    $collectPdf['articles'][$i]['gender'] = $article->gender->label;
                    $collectPdf['articles'][$i]['size'] = $assoc->size->label;
                    $collectPdf['articles'][$i]['color'] = $assoc->color->label;
                    $collectPdf['articles'][$i]['quantity'] = $assoc->quantity;
                    $collectPdf['articles'][$i]['quantityCollected'] = $assoc->quantity_collected ? $assoc->quantity_collected : 0;
                    $i++;
                }
            }
        }

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('layouts.pdf-collect', $collectPdf);

        switch ($action) {
            case 'save':
                return $pdf->save('collect.pdf');
                break;
            case 'stream':
                return $pdf->stream();
                break;
            case 'download':
                return $pdf->download('collect.pdf');
                break;
            default:
                return false;
                break;
        }
    }
}

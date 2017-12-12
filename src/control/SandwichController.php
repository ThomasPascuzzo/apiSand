<?php
namespace lbs2017skeleton\control;
class SandwichController {
    public function getCategories(Request $rq, Response $rs, array $args ) {
        
        $lesCategories = Categorie::get();
        
        $rs = $rs->withStatus( 201 )
                 ->withHeader('Content-Type', 'application/json');
        $rs->getBody()->write(json_encode($lesCategories));
        return $rs;
        
        
    }

    public function getOneCategories(Request $rq, Response $rs, array $args ) {
        
        $id = $args['id'];
        $c = Categorie::find($id);
        $response->getBody()->write($c->toJson());
        return $response;
        
        
    }

    public function getSandwichByCategorie(Request $rq, Response $rs, array $args ) {
        
        
        $id = $args['id'];
        
        $c = Categorie::where('id', '=', $id)->first();
        $liste_sand = $v->sandwich()->get() ;
        $response->getBody()->write($liste_stand->toJson());
        return $response;
        
        
    }

    public function createCategories(Request $rq, Response $rs, array $args ) {
        
        $postVars = $rq->getParsetBody();
        $c = new Categorie();
        $c->nom = filter_var($postVars(["nom"]));
        $c->description = filter_var($postVars(["description"]));
        
        try{
            $c->save();
        }
        catch(\Exception $e) {
            Writer::json_error($rs, 500, $e->getMessage());
        }

        $rs = $rs->withHeader('Location', $this->c['router']->pathFor('categorie',['id'=>  $c->id]));
        return Writer::json_output($rs,201,$c->toArray());
        
        
    }
    public function updateCategories(Request $rq, Response $rs, array $args ) {
        
        $id = $args['id'];
        $data = $request->getParsedBody();
        $c = Categorie::find($id);
        $c->nom = filter_var($postVars(["nom"])) ?: $c->nom;
        $c->description = filter_var($postVars(["description"])) ?: $c->description;
        
        
        try{
            $c->save();
        }
        catch(\Exception $e) {
            Writer::json_error($rs, 500, $e->getMessage());
        }

        $rs = $rs->withHeader('Location', $this->c['router']->pathFor('categorie',['id'=>  $c->id]));
        return Writer::json_output($rs,200,$c->toArray());
        
        
    }
    public function removeCategorie (Request $rq, Response $rs, array $args ) {
        $id = $args['id'];
        $rq = Categorie::find($id);
        $rq->delete();
      
        return $response->withStatus(200);
    }
}










import React, { FunctionComponent } from "react";
import { Link } from "react-router-dom";

const NotFound :FunctionComponent = ()=>{

    return (
        <div className="center">
            <img src="http://assets.pokemon.com/assets/cms2/img/pokedex/full/035.png" alt="Page non trouvée"/>
            <h1>Hey, cette page n'existe pas !</h1> 
            <Link to="/pokemons" className="waves-effect waves-teal btn-flat">
                Retourner au pokédex
            </Link>
        </div>
    )
}

export default NotFound;
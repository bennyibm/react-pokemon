import React, { FunctionComponent, useEffect, useState } from "react";
import { RouteComponentProps } from "react-router-dom";
import ExternalPokemonService from "../commons/externalDB";
import POKEMONS from "../models/mock-pokemons";
import Pokemon from "../models/pokemon";
import PokemonFormulaire from "./pokemon-form";


type Params = {
    id : string
}
const PokemonEdit : FunctionComponent<RouteComponentProps<Params>> = ({match}) => {    
    
    const [pokemon, setPokemon] = useState<Pokemon|null>(null);

    useEffect( ()=>{
        setPokemon(POKEMONS[+match.params.id -1])
    }, [match.params.id]);

    return (
        <div>
            {pokemon?(
                <div className="row">
                    <h2 className="header center"> Editer {pokemon.name}</h2>
                    <PokemonFormulaire pokemon={pokemon} />
                </div>

            ) : (
                <h4 className="center">Aucun pokémon à afficher [id : {match.params.id} ]</h4>
            )}
        </div>
    )
}
export default PokemonEdit;
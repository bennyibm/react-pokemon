import React, {FunctionComponent, useEffect, useState} from "react";
import Pokemon from "../models/pokemon";
import POKEMONS from "../models/mock-pokemons";
import PokemonCard from "../components/PokemonCard";

const PokemonsList : FunctionComponent = () =>{
    const pokemons = POKEMONS;

    return (
        <div>
            <h1 className="center">Pokédex</h1>
            <div className="container">
                <div className="row">
                    {pokemons.map( pokemon =>(
                        <PokemonCard key={pokemon.id}  pokemon={pokemon} />
                    ))}
                </div>
            </div>
        </div>
    );
}

export default PokemonsList;
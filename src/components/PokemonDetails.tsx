import React, { FunctionComponent, useEffect, useState } from "react";
import { RouteComponentProps } from "react-router";
import Pokemon from "../models/pokemon";
import  POKEMONS from "../models/mock-pokemons"
import formatType from "../commons/formatType";
import formatDate from "../commons/formatDate";
import { Link } from "react-router-dom";
import ExternalPokemonService from "../commons/externalDB";
import Navigate from "../commons/Navigation";

type Params = {
    id : string
}
const PokemonDetails : FunctionComponent<RouteComponentProps<Params>> = ({match}) => {
    const [pokemon, setPokemon] = useState<Pokemon|null>();
    const [nextPokemon, setNextPokemon] = useState<Pokemon|null>();
    const [prevPokemon, setPrevPokemon] = useState<Pokemon|null>();

    useEffect( () =>{
        setPokemon(POKEMONS[+match.params.id -1])
        setNextPokemon(POKEMONS[+match.params.id])
        setPrevPokemon(POKEMONS[+match.params.id+2])
        }, [match.params.id]);

    return(
        <div>
            {pokemon ? (
            
            <div className="row">
                <div className="col s12 m8 offset-m2">
                    <h2 className="header center red" style={ {color: "white", padding:"15px", marginBottom: "-6px", borderBottom: "4px double white"} }>{pokemon.name.toUpperCase()}</h2>
                    <div className="card hoverable teal">
                        <div className="card-image">
                            <img src={pokemon.picture} alt={pokemon.name} style={{width:"250px", margin:"0px auto"}} />
                            <Link to={"/pokemons/edit/" + pokemon.id} className="btn btn-floating halfway-fab waves-effect waves-light pulse">
                                <i className="material-icons">edit</i>
                            </Link>
                        </div>
                        <div className="card-stacked">
                            <div className="card-content">
                                <table className="bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>Nom</td>
                                            <td>{pokemon.name}</td>
                                        </tr>
                                        <tr>
                                            <td>Points de vie</td>
                                            <td>{pokemon.hp}</td>
                                        </tr>
                                        <tr>
                                            <td>Dégâts</td>
                                            <td>{pokemon.cp}</td>
                                        </tr>
                                        <tr>
                                            <td>Types</td>

                                            <td>
                                                {pokemon.types.map(type =>(
                                                    <span className={formatType(type)}>{type}</span>
                                                ))}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Date de crtéation</td>
                                            <td>{formatDate(pokemon.created)}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div className="card-action red" style={{borderTop: "4px double white"}}>
                                <div className="row">
                                    <div className="col s6 m6 l3">
                                        <p className="left">
                                            {prevPokemon ? (
                                                <Link to={prevPokemon.id.toString()} className=" btn">
                                                    <i className="material-icons left">arrow_back</i>
                                                    {prevPokemon.name}
                                                </Link>
                                            ) : (
                                                <button className="white btn desable" style={{color: "black", cursor: "not-allowed"}}> No prev</button>
                                            )}

                                            
                                        </p>
                                    </div>
                                    <div className="col l6 hide-on-med-and-down">
                                        <p className="center">
                                            <Link className="btn" to="/">
                                                <i className="material-icons left">apps</i>
                                                Accueil
                                            </Link>
                                        </p>
                                    </div>
                                    <div className="col s6 m6 l3">
                                        <p className="right">
                                            {nextPokemon ? (
                                                <Link to={nextPokemon.id.toString()} className=" btn">
                                                    <i className="material-icons right">arrow_forward</i>
                                                    {nextPokemon.name}
                                                </Link>
                                            ) : (
                                                <button className="white btn desable" style={{color: "black", cursor: "not-allowed"}}> No next</button>
                                            )}
                                            
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ) : (
                <h1>Pookemon not exist</h1>
            )
        }
        </div>
    );
    
    /*return (
        <div>
            <div className="container">
                <div className="section">
                    <h1 className="center">Détails pokemon {pokemon.id}</h1>
                    <table>
                        <caption>
                            <img src={pokemon.picture} alt={pokemon.name} />
                            {pokemon.name} 
                        </caption>
                        <tbody>
                            <tr>
                            <td>Nom</td>
                            <td> {pokemon.name} </td>
                            </tr>
                            <tr>
                                <td>Points de vie</td>
                                <td> {pokemon.cp} </td>
                            </tr>
                            <tr>
                                <td>Dégâts</td>
                                <td> {pokemon.hp} </td>
                            </tr>
                            <tr>
                                <td>Types</td>
                                <td>
                                    {pokemon.types.map(type =>(
                                        <span className={formatType(type)}> {type}</span>
                                    ))}
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
                <div className="section">
                    <a href={pokemons[id-2].id.toString()} className="waves-effect waves-light btn-small">
                        <i className="material-icons left"></i>
                        <small>prev : </small>
                        { id > 2 && pokemons[id-2].name}
                    </a>
                    <a href={pokemons[pokemon.id].id.toString()} className="waves-effect waves-light btn-small">
                        <i className="material-icons right cloud"></i>
                        <small>next : </small>
                        {pokemons[pokemon.id].name}
                    </a>
                </div>
            </div>
        </div>
    );*/
}
export default PokemonDetails;
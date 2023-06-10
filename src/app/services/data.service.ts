import { Injectable } from '@angular/core';
import { Firestore, addDoc, collectionData, deleteDoc, doc, docData, updateDoc } from '@angular/fire/firestore';
import { collection } from '@firebase/firestore';
import { Observable } from 'rxjs';

export interface Animes {
  id?: string;
  nome: string;
  genero: string;
  episodes: number;
  lancamento: string;
}

@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private firestore: Firestore) { }

  getAnimes(): Observable<Animes[]>{
    const animesRef = collection(this.firestore, 'animes')
    return collectionData(animesRef, {idField: 'id'}) as Observable<Animes[]>;
  }

  getAnimesById(id: any): Observable<Animes>{
    const animeDocRef = doc(this.firestore, `animes/${id}`);
    return docData(animeDocRef, {idField: 'id'}) as Observable<Animes>;
  }

  addAnimes(animes: Animes){
    const animesRef = collection(this.firestore, 'animes');
    return addDoc(animesRef, animes);
  }

  deleteAnimes(animes: Animes){
    const animeDocRef = doc(this.firestore, `animes/${animes.id}`);
    return deleteDoc(animeDocRef);
  }

  updateAnime(animes: Animes){
    const animeDocRef = doc(this.firestore, `animes/${animes.id}`);
    return updateDoc(animeDocRef, {nome: animes.nome, genero: animes.genero, episodes: animes.episodes, lancamento: animes.lancamento});
  }

}

from rdflib import Graph
from rdflib.namespace import RDF, FOAF, RDFS, OWL
from rdflib import URIRef, BNode, Literal
from rdflib.namespace import XSD
import rdflib
import sys
import json

nama_makanan = eval(sys.argv[1])[0]
deskripsi_makanan = eval(sys.argv[1])[1]
jumlah_porsi = eval(sys.argv[1])[2]
alamat = eval(sys.argv[1])[3]
kota = eval(sys.argv[1])[4]
tanggal = eval(sys.argv[1])[5]

RDF.type
RDF.datatype
RDFS.label
RDFS.comment
RDFS.seeAlso
OWL.About
# = rdflib.term.URIRef(u'http://www.w3.org/1999/02/22-rdf-syntax-ns#type')

FOAF.knows
# = rdflib.term.URIRef(u'http://xmlns.com/foaf/0.1/knows')

g = Graph()
g.parse("C:\\xampp7\\htdocs\\TA\\Gifood.rdf")


nm = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#Transaksi"+tanggal)
# linda = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#Linda")
ind = URIRef("http://www.w3.org/2002/07/owl#NamedIndividual")
tipe = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#FoodOntology")
trans = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#Transaksi")
stat = rdflib.term.URIRef(u'http://www.w3.org/2000/01/rdf-schema#status')

g.add( (nm, RDF.type, tipe ) )
g.add( (nm, RDF.type, trans ) )
g.add( (nm, RDFS.comment, Literal('Judul : '+nama_makanan, lang="en")) )
g.add( (nm, RDFS.comment, Literal('Deskripsi : '+deskripsi_makanan, lang="en")) )
g.add( (nm, RDFS.comment, Literal('Lokasi : '+alamat, lang="en")) )
g.add( (nm, RDFS.comment, Literal('Kota : '+kota, lang="en")) )
g.add( (nm, RDFS.comment, Literal('Jumlah : '+jumlah_porsi, lang="en")) )
g.add( (nm, RDFS.comment, Literal('Expired Date : '+tanggal, lang="en")) )
g.add( (nm, RDF.type, ind) )
g.add( (nm, RDFS.label, Literal('transaksi', lang="en")) )
g.add( (nm, stat, Literal('ongoing', lang="en") ) )

# print g.serialize(format='turtle')

g.serialize("C:\\xampp7\\htdocs\\TA\\Gifood.rdf")
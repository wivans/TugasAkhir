from rdflib import Graph
from rdflib.namespace import RDF, FOAF, RDFS, OWL
from rdflib import URIRef, BNode, Literal
from rdflib.namespace import XSD
import rdflib
import sys
import json

entity = eval(sys.argv[1])[0]

RDF.type
RDF.datatype
RDFS.label
RDFS.comment
RDFS.seeAlso
OWL.About

g = Graph()
g.parse("C:\\xampp\\htdocs\\foody\\foody.rdf")

entity = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+entity)

g.remove( (+entity, None, None) )

g.serialize("C:\\xampp\\htdocs\\foody\\foody.rdf")
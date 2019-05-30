from rdflib import Graph
from rdflib.namespace import RDF, FOAF, RDFS, OWL
from rdflib import URIRef, BNode, Literal
from rdflib.namespace import XSD
import rdflib
import sys
import json

kelas = eval(sys.argv[1])[0]
individu = eval(sys.argv[1])[1]


RDF.type
RDF.datatype
RDFS.label
RDFS.comment
RDFS.seeAlso
OWL.About


FOAF.knows

g = Graph()
g.parse("C:\\xampp\\htdocs\\foody\\foody.rdf")


kelaz = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+kelas)
individual = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+individu)


g.add( (individual, RDF.type, kelaz ) )
#g.add( (individual, RDFS.label, Literal(individu, lang="en") )


g.serialize("C:\\xampp\\htdocs\\foody\\foody.rdf")
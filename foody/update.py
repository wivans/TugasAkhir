from rdflib import Graph
from rdflib.namespace import RDF, FOAF, RDFS, OWL
from rdflib import URIRef, BNode, Literal
from rdflib.namespace import XSD
import rdflib
import sys
import json


individu2 = (sys.argv[1])
individu =  (sys.argv[2])

print(individu)
print(individu2)


RDF.type
RDF.datatype
RDFS.label
RDFS.comment
RDFS.seeAlso
OWL.About


FOAF.knows
# = rdflib.term.URIRef(u'http://xmlns.com/foaf/0.1/knows')

g = Graph()
g.parse("C:\\xampp\\htdocs\\foody\\foody.rdf")



var_individu2 = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+individu2)

#g.add( (var_individu2, RDFS.label, Literal(individu2, lang="en")) )
g.add( (var_individu2, RDFS.label, Literal(individu, lang="en")) )
print(var_individu2)
#var_individu2 = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+individu2)
#g.set( (var_individu, RDFS.label, Literal(individu, lang="en")) )



# print g.serialize(format='turtle')

g.serialize("C:\\xampp\\htdocs\\foody\\foody.rdf")
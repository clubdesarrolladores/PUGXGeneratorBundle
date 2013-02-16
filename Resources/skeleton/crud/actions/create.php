
    /**
     * Creates a new {{ entity }} entity.
     *
{% if 'annotation' == format %}
     * @Route("/create", name="{{ route_name_prefix }}_create")
     * @Method("POST")
     * @Template("{{ bundle }}:{{ entity }}:new.html.twig")
{% endif %}
     */
    public function createAction(Request $request)
    {
        ${{ entity|lower }} = new {{ entity_class }}();
        $form = $this->createForm(new {{ entity_class }}Type(), ${{ entity|lower }});

        if ($form->bind($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist(${{ entity|lower }});
            $em->flush();

            {% if 'show' in actions -%}
                return $this->redirect($this->generateUrl('{{ route_name_prefix }}_show', array('id' => ${{ entity|lower }}->getId())));
            {%- else -%}
                return $this->redirect($this->generateUrl('{{ route_name_prefix }}'));
            {%- endif %}

        }

{% if 'annotation' == format %}
        return array(
            '{{ entity|lower }}' => ${{ entity|lower }},
            'form'   => $form->createView(),
        );
{% else %}
        return $this->render('{{ bundle }}:{{ entity|replace({'\\': '/'}) }}:new.html.twig', array(
            '{{ entity|lower }}' => ${{ entity|lower }},
            'form'   => $form->createView(),
        ));
{% endif %}
    }
